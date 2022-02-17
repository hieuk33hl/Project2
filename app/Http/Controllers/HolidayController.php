<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listHoliday = Holiday::all();
        return view('holiday.list', [
            'listHoliday' => $listHoliday,
        ]);
    }


    public function create()
    {
        return view('holiday.create');
    }


    public function store(Request $request)
    {
        $name = $request->get('name_holiday');
        $day = date_create($request->get('date_holiday'));
        $date = date_format($day, "m-d");
        $holi = new Holiday();
        $holi->name_holiday = $name;
        $holi->date_holiday = $date;
        $holi->save();
        return redirect(route('holiday.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $holi = Holiday::find($id);
        return view('holiday.edit', [
            "holi" => $holi
        ]);
    }


    public function update(Request $request, $id)
    {
        $name = $request->get('name_holiday');
        $date = $request->get('date_holiday');
        // $day = date_create($request->get('date_holiday'));
        // $date = date_format($day, "m-d");
        $holi = Holiday::find();
        $holi->name_holiday = $name;
        $holi->date_holiday = $date;
        $holi->save();
        return redirect()->route('holiday.index');
    }

    public function destroy($id)
    {
        Holiday::where('id_holiday', $id)->delete();
        return redirect(route('holiday.index'));
    }
}
