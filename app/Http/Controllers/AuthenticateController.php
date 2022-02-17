<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class AuthenticateController extends Controller
{

    public function loginAdmin()
    {
        return view('login');
    }

    public function loginProcessAdmin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $admin = Admin::where('email_admin', $email)->where('pass_admin', $password)->firstOrFail();
            $request->session()->put('admin', $admin);

            return Redirect::route('statistics.index');
        } catch (Exception $e) {
            return Redirect::route('login-admin')->with('error', 'Tài khoản hoặc mật khẩu sai');
        }
    }
    //admin
    public function logoutAdmin(Request $request)
    {
        $request->session()->pull('admin');

        return Redirect::route('login-admin');
    }
    ///sag file khác viết vì bị lẫn đx đấy
    //user
    public function loginUser()
    {
        return view('user.login');
    }

    public function loginProcessUser(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        try {
            $user = Employee::where('email', $email)->where('password', $password)->where('available', 1)->firstOrFail();
            $request->session()->put('user', $user);
            return Redirect::route('userIndex');
            // đang dùng đăng nhập cả admin cả employee à
        } catch (Exception $e) {
            return Redirect::route('login-user')->with('error', 'Sai tài khoản hoặc mật khẩu ');
        }
    }

    public function logoutUser(Request $request)
    {
        $request->session()->pull('user');
        return Redirect::route('login-user');
    }
}
