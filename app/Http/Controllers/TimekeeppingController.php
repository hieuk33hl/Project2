<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LegalOff;
use App\Models\Timekeeping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\TimeExport;
use App\Exports\TimeExportMultiple;
use Carbon\Carbon;
use Datetime;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TimekeeppingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('checkin')->only('store');
    // }

    public function index()
    {
        $listTime = Timekeeping::join("employees", "employees.id_employee", "=", "timekeeping.id_employee")
            ->where("timekeeping.available", "=", 1)
            ->orderBy('employees.id_employee', 'desc')
            ->paginate(5);

        $years = DB::table('timekeeping')->selectRaw('YEAR(date) as value')->distinct()->orderBy('date')->get();
        return view('timekeeping.list', [
            "listTime" => $listTime,
            "years" => $years
        ]);
    }

    // k check -> admin check rồi insert vào cột phạt 100k-> nghỉ k phép
    public function check()
    {
        $listTime = Timekeeping::join("employees", "employees.id_employee", "=", "timekeeping.id_employee")
            ->where("timekeeping.available", "=", 1)
            ->orderBy('employees.id_employee', 'asc')
            ->paginate(5);


        $id_emp = Employee::all();
        foreach ($id_emp as $id) {
            $daynow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $idEmp = $id->id_employee;
            $checkID = Timekeeping::where('id_employee', '=', $idEmp)
                ->where('date', '=', $daynow)
                ->select('id_employee')
                ->first();
            if ($checkID === null) {
                //so sánh ngày vs bảng nghỉ
                $sql = LegalOff::where('id_employee', '=', $idEmp)
                    ->where('approve', '=', 1)
                    ->where('available', '=', 1)
                    ->where('strat_time_off', '<=', $daynow)
                    ->where('end_time_off', '>=', $daynow)
                    ->first();
                if ($sql === null) {
                    $sql1 = Timekeeping::create([
                        'id_employee' => $idEmp,
                        'date' => $daynow,
                        'phat' => 100,
                    ]);
                }
            } else {
                //$check = "SELECT `timekeeping`.`id_employee`  FROM `timekeeping` WHERE Date ='$date' and id_employee = $id_employee 
                // and checkout IS NULL" ;(fisrt )
                // $check = Timekeeping::where([
                //     'id_employee' => $idEmp,
                //     'date' => $daynow,
                //     'checkout' => null,
                // ])->first();
                $check = Timekeeping::where('id_employee', '=', $idEmp)
                    ->where('date', '=', $daynow)
                    ->where('checkout', '=', null)
                    ->first();
                // dd($check);
                $phat = $check->phat;

                $phat1 = $phat + $check->phat;
                // dd($phat1);
                // if ($check === null) {

                // $sql2 = Timekeeping::create([
                //     'id_employee' => $idEmp,
                //     'date' => $daynow,
                //     'phat' => $phat1,
                // ]);
                $sql2 = DB::table('timekeeping')
                    ->where("id_employee", "=", $idEmp)
                    ->where("date", "=", $daynow)
                    ->update(["phat" => $phat1]);
                // }
            }
        }
        // return view('timekeeping.list', [
        //     'listTime' => $listTime,
        // ]);
        return Redirect()->route('timekeeping.index');
    }

    public function create()
    {
        $mydate = new DateTime();
        $mydate->modify('+7 hours');
        $curendtDate = $mydate->format('Y-m-d');
        $Emp =  Session::get('user');
        $idEmp = $Emp->id_employee;
        $check = DB::table("timekeeping")
            ->where("date", "=", $curendtDate)
            ->where("id_employee", "=", $idEmp)
            ->get();
        // dd($check);
        return view(
            'user.index',
            [
                "checks" => $check,
                "idEmp" => $idEmp
            ],
        );
    }


    public function store(Request $request)
    {
        $checkout = $request->get('checkout');
        $idEmp = $request->get('id_employee');
        $checkin = $request->get('checkin');
        $date = $request->get('date');
        $available = $request->get('available');

        $mydate = new DateTime();
        $mydate->modify('+7 hours');
        $curendtDate = $mydate->format('Y-m-d');
        $phat = 0;

        $check = DB::table('timekeeping')
            ->where('date', '=', $curendtDate)
            ->where('id_employee', '=', $idEmp)
            ->count();
        if ($check == 0) {
            if ($checkin != null) {
                if ((float)$checkin > 8) {
                    $phat = 20;
                }

                $timekeeping = new Timekeeping();
                $timekeeping->id_employee = $idEmp;
                $timekeeping->checkin = $checkin;
                $timekeeping->checkout = $checkout;
                $timekeeping->date = $date;
                $timekeeping->available = $available;
                $timekeeping->phat = $phat;
                $timekeeping->save();

                return redirect(route('userIndex'));
            }
        }

        $check1 = DB::table('timekeeping')
            ->where('date', '=', $curendtDate)
            ->where('id_employee', '=', $idEmp)
            ->get();
        $count = null;
        foreach ($check1 as $check1) {
            $count = $check1->checkout;
        }
        if ($count == null) {
            if ($checkout != null) {

                $mydate = new DateTime();
                $mydate->modify('+7 hours');
                $curendtDate = $mydate->format('Y-m-d');
                $timekeeping = DB::table("timekeeping")
                    ->where("date", "=", $curendtDate)
                    ->where("id_employee", "=", $idEmp)
                    ->get();
                // dd($timekeeping);

                foreach ($timekeeping as $id) {
                    $hour = (float)$checkout;
                    $phat = $id->phat;
                    if ($hour < 17) {
                        if ($id->phat != 0) {
                            $phat = $id->phat + 20;;
                        } else {
                            $phat = 0;
                        }
                    }
                    // dd($phat);
                    $id = $id->id_timekeeping;

                    $timekeeping = Timekeeping::find($id);
                    $timekeeping->id_employee;
                    $timekeeping->checkout = $checkout;
                    $timekeeping->date = $date;
                    $timekeeping->phat = $phat;

                    $timekeeping->save();

                    return redirect()->route('userIndex');
                }
            }
        }
        return redirect()->route('userIndex');
    }
    public function show($id)
    {
    }

    public function checkinout(Request $request)
    {
        $checkout = $request->get('checkin');
        $date = $request->get("date");
        $idEmp = $request->get('id_employee');
    }


    public function hide($id)
    {

        $Dep = DB::table("timekeeping")
            ->where("id_timekipping", "=", $id)
            ->update(["available" => 0]);
        return redirect("timekeeping");
    }

    public function export(Request $request)
    {
        $request->validate([
            'year' => "required",
            'month' => "required"
        ]);

        return (new TimeExportMultiple($request->year, $request->month))->download('time_' . time() . '.xlsx');
    }
}
