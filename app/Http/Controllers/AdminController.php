<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listAdmin = Admin::where('name_admin', 'like', "%$search%")->paginate(4);
        // $listAdmin = Admin::paginate(5);
        return view('admin.list', [
            "listAdmin" => $listAdmin,
            "search" => $search,
        ]);
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {
        $nameAdmin = $request->get('name_admin');
        $phoneAdmin = $request->get('phone_admin');
        $emailAdmin = $request->get('email_admin');
        $passAdmin = $request->get('pass_admin');
        $roleAdmin = $request->get('role_admin');
        $admin = new Admin();
        $admin->name_admin = $nameAdmin;
        $admin->phone_admin = $phoneAdmin;
        $admin->email_admin = $emailAdmin;
        $admin->pass_admin = $passAdmin;
        $admin->role = $roleAdmin;
        $admin->save();
        return redirect(route('admin.index'));
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
        $admin = Admin::find($id);
        return view('admin.edit', [
            "admin" => $admin
        ]);
    }


    public function update(Request $request, $id)
    {
        $name = $request->get('name_admin');
        $phone = $request->get('phone_admin');
        $email = $request->get('email_admin');
        $pass = $request->get('pass_admin');
        $role = $request->get('role');
        $admin = Admin::find($id);
        $admin->name_admin = $name;
        $admin->phone_admin = $phone;
        $admin->email_admin = $email;
        $admin->pass_admin = $pass;
        $admin->role  = $role;
        $admin->save();
        return redirect()->route('admin.index');
    }


    public function destroy($id)
    {
        Admin::where('id_admin', $id)->where('role', "=", 1)->delete();
        return redirect(route('admin.index'));
    }

    // public function hide($id)
    // {
    //     // $assign = DB::table("asign")
    //     //         ->where("id_admin","=",$id)
    //     //         ->update([availaber]=>0);
    //     $data = Admin::find($id);
    //     $data->available = 0;
    //     $data->save();
    //     return redirect('admin');
    // }
}
