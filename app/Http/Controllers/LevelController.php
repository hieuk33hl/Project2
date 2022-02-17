<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLevel = DB::table("level")
            ->where("available", "=", 1)
            ->get();

        return view('level.list', [
            "listLevel" => $listLevel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Level::create($request->all());
        $nameLevel = $request->get('name_level');
        $basicSalary = $request->get('basic_salary');
        $available = $request->get('available');
        $level = new Level();
        $level->name_level = $nameLevel;
        $level->basic_salary = $basicSalary;
        $level->available = $available;
        $level->save();
        return redirect(route('level.index'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Level $level, Request $request)
    {
        $level->update($request->all());
        return redirect()->route('level.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Level::where('id_level', $id)->delete();
        // return redirect(route('level.index'));
    }
    public function hide($id)
    {
        $Emp = DB::table("employees")
            ->where("level", "=", $id)
            ->update(["available" => 0]);
        $Level = DB::table("level")
            ->where("id_level", "=", $id)
            ->update(["available" => 0]);
        return redirect("level");
    }
}
