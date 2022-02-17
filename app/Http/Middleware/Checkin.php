<?php

namespace App\Http\Middleware;

use App\Models\Timekeeping;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Checkin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = null;
        $id = session('user')->id_employee;

        $date1 = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $count = 0;
        $count = Timekeeping::where("date", "=", $date1)
            ->where("id_employee", "=", $id)
            ->count("checkin");
        if ($count < 1) {
            return $next($request);
        } else {
            // $count1 = Timekeeping::where("date", "=", $date1)
            //     ->where("id_employee", "=", $id)->whereNotNull('checkout')
            //     ->count("checkout");
            // if ($count1 < 1) {
            //     return $next($request);
            // } else {
            //     return Redirect::route('userIndex')->with('error', 'Bạn đã checkout');
            // }cái này cho checkout 
            return Redirect::route('userIndex')->with('error', 'Bạn đã checkin');
        }
    }
}
