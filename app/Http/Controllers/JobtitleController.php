<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Whoops\Run;

class JobtitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listJob = DB::table("jobtitle")
            ->where("available", "=", 1)
            ->get();
        return view('job_title.list', [
            "listJob" => $listJob
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job_title.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namejobTitle = $request->get('nameJob');
        $available = $request->get('available');
        $jobtitle = new jobTitle();
        $jobtitle->name_jobTitle = $namejobTitle;
        $jobtitle->available = $available;
        $jobtitle->save();
        return redirect(route('jobTitle.index'));
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
    public function edit($id)
    {
        $job = JobTitle::find($id);
        return view('job_title.edit', [
            "job" => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('nameJob');
        $job = JobTitle::find($id);
        $job->name_jobTitle = $name;
        $job->save();
        return redirect()->route('jobTitle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // JobTitle::where('id_jobTitle', $id)->delete();
        // return redirect(route('jobTitle.index'));
    }
    public function hide($id)
    {
        $Emp = DB::table("employees")
            ->where("id_jobTitle", "=", $id)
            ->update(["available" => 0]);
        $Dep = DB::table("jobtitle")
            ->where("id_jobTitle", "=", $id)
            ->update(["available" => 0]);
        return redirect("jobTitle");
    }
}
