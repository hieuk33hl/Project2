<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Imports\EmployeeImport;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        // $search = $request->get('search');
        $idDep = $request->get('id-dep');
        $listDepa = Department::all();
        switch ($idDep) {
            case '':
                $listEmp = Employee::join("level", "employees.level", "=", "level.id_level")
                    ->join("departments", "employees.id_department", "=", "departments.id_department")
                    ->join("jobtitle", "employees.id_jobTitle", "=", "jobtitle.id_jobTitle")
                    // ->select("employees.*", "departments.name_department", "jobtitle.name_jobTitle")
                    // ->where("employees.id_department", $idDep)
                    ->where("employees.available", "=", 1)
                    // ->where('name_empployee', 'like', "%$search%")
                    ->paginate(10);
                break;

            default:
                $listEmp = Employee::join("level", "employees.level", "=", "level.id_level")
                    ->join("departments", "employees.id_department", "=", "departments.id_department")
                    ->join("jobtitle", "employees.id_jobTitle", "=", "jobtitle.id_jobTitle")
                    // ->select("employees.*", "departments.name_department", "jobtitle.name_jobTitle")
                    ->where("employees.id_department", $idDep)
                    ->where("employees.available", "=", 1)
                    // ->where('name_empployee', 'like', "%$search%")
                    ->paginate(10);
                break;
        }
        // $listEmp = Employee::join("level", "employees.level", "=", "level.id_level")
        //     ->join("departments", "employees.id_department", "=", "departments.id_department")
        //     ->join("jobtitle", "employees.id_jobTitle", "=", "jobtitle.id_jobTitle")
        //     // ->select("employees.*", "departments.name_department", "jobtitle.name_jobTitle")
        //     ->where("employees.id_department", $idDep)
        //     ->where("employees.available", "=", 1)
        //     ->where('name_empployee', 'like', "%$search%")
        //     ->paginate(10);
        //

        return view('employee.list', [
            'listEmp' => $listEmp,
            // 'search' => $search,
            'listDepa' => $listDepa,
            'idDep' => $idDep,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        // $salaryperhour = $request->get('salaryperhouse');
        $employee = new employee();
        $employee->name_empployee = $name;
        // $employee->salaryPerHour = $salaryperhour;
        $employee->save();
        return redirect(route('employee.index'));
    }


    public function show($id)
    {
        $employee = Employee::join("departments", "employees.id_department", "=", "departments.id_department")
            ->join("jobtitle", "employees.id_jobTitle", "=", "jobtitle.id_jobTitle")
            ->find($id);
        return view('employee.show', [
            "employee" => $employee
        ]);
    }


    public function edit($id)
    {
        $listJob = JobTitle::all();
        $listDep = Department::all();
        $employee = Employee::find($id);
        return view('employee.edit', [
            "employee" => $employee,
            'listDep' => $listDep,
            'listJob' => $listJob,
        ]);
    }


    public function update(Request $request, $id)
    {
        $name = $request->get('name_emp');
        // $salaryperhouse = $request->get('salaryperhouse');
        $date = $request->get('dateOfBirth');
        $gender = $request->get('gender');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $email = $request->get('email');
        $level = $request->get('level');
        $dep = $request->get('id_department');
        $job = $request->get('id_jobTitle');
        $employee = Employee::find($id);
        $employee->name_empployee = $name;
        $employee->dateOfBirth = $date;
        $employee->gender = $gender;
        $employee->phoneNumber = $phone;
        $employee->address = $address;
        $employee->email = $email;
        $employee->level = $level;
        // $employee->salaryPerHour = $salaryperhouse;
        $employee->id_department = $dep;
        $employee->id_jobTitle = $job;
        $employee->save();
        return redirect()->route('employee.index');
    }


    public function destroy($id)
    {
        //
    }

    public function hide($id)
    {
        $legalOff = DB::table("legal_off")
            ->where("id_employee", "=", $id)
            ->update(["available" => 0]);
        $Timekeep = DB::table("timekeeping")
            ->where("id_employee", "=", $id)
            ->update(["available" => 0]);
        $Emp = DB::table("employees")
            ->where("id_employee", "=", $id)
            ->update(["available" => 0]);
        return redirect("employee");
    }



    public function insertExcel()
    {
        return view('employee.insert-excel');
    }

    public function insertExcelProcess(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file('excel'));
        return Redirect::route('employee.index')->withStatus('Import thành công');
    }

    public function changePassword($id)
    {
        $emp = Employee::find($id);
        return view("infor.changPass", [
            'emp' => $emp,
        ]);
    }

    public function changePasswordProcess(Request $request, $id)
    {
        $current_pass = $request->get("current_password");
        $new_pass = $request->get('new_password');
        $new_pass_confirmation = $request->get('new_password_confirmation');
        $emp = Employee::find($id);
        if ($current_pass == $emp->password) {
            if ($new_pass == $new_pass_confirmation) {
                $emp->password = $new_pass;
                $emp->save();
                return Redirect::route('changePa', $emp->id_employee)->with('success', 'Password is updated successfully');
            } else {
                return Redirect::route('changePa', $emp->id_employee)->with('error1', 'New password cofirmation is not matched with new password');
            }
        } else {
            return Redirect::route('changePa', $emp->id_employee)->with('error', 'Current password is not matched with old password');
        }
    }

    public function profile($id)
    {
        $emp = Employee::join("level", "employees.level", "=", "level.id_level")
            ->join("departments", "employees.id_department", "=", "departments.id_department")
            ->join("jobtitle", "employees.id_jobTitle", "=", "jobtitle.id_jobTitle")->find($id);
        return view('infor.profile', [
            'emp' => $emp,
        ]);
    }
    public function editProfileProcess(Request $request, $id)
    {
        $name = $request->get('nameEmp');
        // $date = $request->get('birthdate');
        $gender = $request->get('gt');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $email = $request->get('emailEmp');
        $level = $request->get('level');
        $dep = $request->get('depart');
        $job = $request->get('job');
        $employee = Employee::find($id);
        $employee->name_empployee = $name;
        // $employee->dateOfBirth = $date;
        $employee->gender = $gender;
        $employee->phoneNumber = $phone;
        $employee->address = $address;
        $employee->email = $email;
        $employee->level = $level;
        $employee->id_department = $dep;
        $employee->id_jobTitle = $job;
        $employee->save();
        return redirect()->route('profile', $id)->with('success', "Employee is updated successfully");
    }
}
