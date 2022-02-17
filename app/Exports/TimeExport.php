<?php

namespace App\Exports;

use App\Models\SalaryDetail;
use App\Models\Timekeeping;
use App\Models\Employee;
use Facade\FlareClient\Time\Time;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class TimeExport implements FromView, ShouldAutoSize, WithTitle
{
    use Exportable;

    private $year;
    private $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function view(): View
    {
        $listTime = Timekeeping::whereYear('date', $this->year)
            ->join("employees", "employees.id_employee", "=", "timekeeping.id_employee")
            ->whereMonth('date', $this->month)->get();
        // dd($this->year, $this->month);
        // $idEmp = SalaryDetail::whereYear('fromdate', $this->year)->whereMonth('fromdate', $this->month)->get();
        $idEmp = Employee::join("level", "employees.level", "=", "level.id_level")
            ->join("jobtitle", "employees.id_jobTitle", "=", "jobtitle.id_jobTitle")
            ->join("salary_detail", "employees.id_employee", "=", "salary_detail.id_employee")
            ->whereMonth("fromdate", "=", $this->month)
            ->whereYear("fromdate", "=", $this->year)
            ->get();
        $count = 0;
        $j = 0;
        $array[] = null;


        //SELECT COUNT(phat) FROM timekeeping WHERE id_employee = 1 and month(date) ='08' AND phat != 0
        foreach ($idEmp as $id) {
            $idEmp = $id->id_employee;
            $month = date_create($id->date);
            $month1 = date_format($month, "m");
            // dd($month1);
            $year1 = date_format($month, "Y");
            $count = Timekeeping::where('id_employee', '=', $idEmp)
                ->whereMonth('date', "=", $month1)
                ->whereYear('date', "=", $year1)
                ->where('phat', "!=", 0)
                ->count();

            $list = [
                'id_employee' => $id->id_employee,
                'ten_nv' => $id->name_empployee,
                'salary_basic' => $id->basic_salary,
                'job_title' => $id->name_jobTitle,
                'salary' => $id->salary,
                'phat' => $count,
            ];
            $array[$j++] = $list;
        }
        return view('timekeeping.export', [
            'listTime' => $listTime,
            'idEmp' => $array,
        ]);
    }

    public function title(): string
    {
        return 'Month ' . $this->month;
    }
}
