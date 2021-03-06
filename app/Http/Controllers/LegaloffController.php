<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LegalOff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LegaloffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLegal = LegalOff::join("employees", "employees.id_employee", "=", "legal_off.id_employee")
            // ->where("legal_off.available", "=", 1
            ->orderByRaw(' legal_off.id_legal DESC')
            ->paginate(10);
        return view('legal_off.list', [
            'listLegal' => $listLegal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.index');
    }

    public function store(Request $request)
    {
        // $id = $request->get('id_employee');
        $name = $request->get('name_emp');
        $reason = $request->get('reason');
        $note = $request->get('note');
        $start_time_off = $request->get('start_time_off');
        $end_time_off = $request->get('end_time_off');
        $legal = new LegalOff();
        $legal->id_employee = $name;
        $legal->reason = $reason;
        $legal->note = $note;
        $legal->strat_time_off = $start_time_off;
        $legal->end_time_off = $end_time_off;
        // $legal->available = $available;
        $legal->save();
        // LegalOff::create($request->all());
        return view('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $legal = LegalOff::join("employees", "employees.id_employee", "=", "legal_off.id_employee")
            ->find($id);
        return view('legal_off.show', [
            "legal" => $legal
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function hide($id)
    {

        $Dep = DB::table("legal_off")
            ->where("id_legal", "=", $id)
            ->update(["available" => 0]);
        return redirect("legalOff");
    }
    // t??? g???i k??m theo c??i id c???u ????n ch??? th?? m???i bi???t th???ng naofnmaf c???p nh???t l???i tr???ng th??i cho th???ng ?????y ch???nc
    // duy???t
    public function approve($id)
    {
        // ????y l???y ra ??? ????y trc ???? xong xem tr???ng th??i ??ax n???u m?? kh??c null th?? k cho lmj hi???u ch??a
        $kaka = DB::table('legal_off')
            ->where('id_legal', $id)->value('approve');

        if ($kaka === null) {
            $affected = DB::table('legal_off')
                ->where('id_legal', $id)
                ->update(['approve' => 0]);
        }
        return redirect("legalOff");
    }

    // k duy???t
    public function approve1($id)
    {
        $kaka = DB::table('legal_off')
            ->where('id_legal', $id)->value('approve');
        if ($kaka === null) {
            $affected = DB::table('legal_off')
                ->where('id_legal', $id)
                ->update(['approve' => 1]);
        }
        return redirect("legalOff");
    }
}
