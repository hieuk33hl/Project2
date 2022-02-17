<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TimeExportMultiple implements WithMultipleSheets
{
    use Exportable;

    protected $year;
    protected $months;

    public function __construct($year, $months)
    {
        $this->year = $year;
        $this->months = $months;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $months = [];

        if (count($this->months) === 1 && $this->months[0] === null) {
            $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        } else {
            $months = $this->months;
        }


        // dd($months);
        foreach ($months as $month) {
            $sheets[] = new TimeExport($this->year, $month);
        }

        return $sheets;
    }
}
