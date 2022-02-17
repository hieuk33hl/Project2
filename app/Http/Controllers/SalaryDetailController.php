<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Models\Employee;
use App\Models\SalaryDetail as ModelsSalaryDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Timekeeping;
use App\Models\SalaryDetail;

class SalaryDetailController extends Controller
{
    public function index()
    {
        $listSalary = SalaryDetail::join("employees", "salary_detail.id_employee", "=", "employees.id_employee")
            ->join("jobtitle", "salary_detail.id_jobtitle", "=", "jobtitle.id_jobTitle")
            // ->orderBy('employees.id_employee', 'desc')
            ->get();
        // $listSalary = SalaryDetail::join("level", "salary_detail.id_level", "=", "level.id_level")
        //     ->get();
        // dd($listSalary);
        return view('salary.list', [
            "listSalary" => $listSalary,
        ]);
    }

    public function holiday(Request $request)
    {
        $timeString = $request->get('date');
        $start =  $timeString ? Carbon::parse($timeString)->startOfMonth()
            : Carbon::today()->startOfMonth();

        $end = $start->copy()->endOfMonth();
        // echo $end;
        $month = $start->month;
        //ngày di lm trg tuần
        $workingDays = [1, 2, 3, 4, 5, 6];
        // $holidayDays = ['*-09-025', '*-01-01', '*-09-02', '*-09-12'];
        $array = [];
        //lấy all ngày nghỉ lễ
        $query = Holiday::all();
        foreach ($query as $row) {
            $day = '*-' . $row->date_holiday;
            $array[] = $day;
        }
        //ngày lễ
        $holidayDays = $array;
        //tính ra số ngày chủ nhật 1thangs
        $dayoff = $start->diffInDaysFiltered(function (Carbon $date) use ($workingDays) {
            return !in_array($date->format('N'), $workingDays);
        }, $end);
        // echo $dayoff;

        //tính ra số ngày nghỉ lễ 1 tháng
        $dayoff2 = $start->diffInDaysFiltered(function (Carbon $date) use ($holidayDays) {
            return in_array($date->format('*-m-d'), $holidayDays);
        }, $end);

        //số ngày của 1 tháng
        $days = $start->diffInDaysFiltered(function (Carbon $date) use ($workingDays) {
            return  $date;
        }, $end);
        // echo $days;

        // số ngày công chuẩn/thang
        $daystream = $days - $dayoff;

        $id_emp = Employee::join("level", "employees.level", "=", "level.id_level")
            ->join("jobtitle", "employees.id_jobTitle", "=", "jobtitle.id_jobTitle")
            ->get();
        foreach ($id_emp as $id) {
            //SELECT COUNT(*) FROM `timekeeping` WHERE month(date) = '08' AND id_employee=2 AND checkin is null AND checkout is null
            $dem = Timekeeping::where('id_employee', '=', $id->id_employee)->whereMonth('date', $month)->whereNull('checkin')->whereNull('checkout')->count();
            $phat = 0;
            // echo $dem;
            $demphat = Timekeeping::where('id_employee', '=', $id->id_employee)->whereMonth('date', $month)->get();

            foreach ($demphat as $row) {
                $phat = $phat + $row->phat;
            }

            //số ngày làm hưởng lương
            $stream = $daystream - ($dem + $dayoff2);

            $luong = ($id->basic_salary / $daystream) * $stream - $phat;
            // echo $luong;
            // dd($id_emp);
            $a = SalaryDetail::create([
                'id_employee' => $id->id_employee,
                'fromdate' => $start,
                'todate' => $end,
                'salary' => $luong,
                'id_jobTitle' => $id->id_jobTitle,
                'id_level' => $id->basic_salary,
            ]);
        }

        // return  view('salary.list');
        return redirect()->route('salary.index');
    }
}
