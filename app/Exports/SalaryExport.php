<?php

namespace App\Exports;

use App\Models\SalaryDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalaryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SalaryDetail::all();
    }
}
