<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPart = DB::table("departments")
            ->where("available", "=", 1)
            ->get();
        return view('department.list', [
            "listPart" => $listPart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namePart = $request->get('namePart');
        $available = $request->get('available');
        $part = new department();
        $part->name_department = $namePart;
        $part->available = $available;
        $part->save();
        return redirect(route('department.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dep = Department::find($id);
        return view('department.edit', [
            "dep" => $dep
        ]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->get('name_dep');
        $dep = Department::find($id);
        $dep->name_department = $name;
        $dep->save();
        return redirect()->route('department.index');
    }


    public function destroy($id)
    {
        // Department::where('id_department', $id)->delete();
        // return redirect(route('department.index'));
    }
    public function hide($id)
    {
        $Emp = DB::table("employees")
            ->where("id_department", "=", $id)
            ->update(["available" => 0]);
        $Dep = DB::table("departments")
            ->where("id_department", "=", $id)
            ->update(["available" => 0]);
        return redirect("department");
    }
}
