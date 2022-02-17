<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $date = str_replace('/', '-', $row['ngay_sinh']);
        // $row['phong_ban_id'] = Department::where("name_department", "like", "%" . $row['phong_ban'] . "%");
        // $nameDep = Department::where("name_department", "like", "%" . $row['phong_ban'] . "%")->first();
        // $row['phong_ban_id'] = $nameDep->id_department;
        // dd([

        // ]);
        return new Employee([
            'name_empployee' => $row['ten'],
            'dateOfBirth' => date('Y-m-d', strtotime($date)),
            'gender' => $row['gioi_tinh'] == "Nam" ? 1 : 0,
            'phoneNumber' => $row['so_dien_thoai'],
            'address' => $row['dia_chi'],
            'email' => $row['email'],
            'password' => $row['pass'],
            // 'salaryPerHour' => $row['luong_1h'],
            'level' => $row['level'],
            'id_department' => Department::where("name_department", $row['phong_ban'])->first()->id_department,
            // 'id_department' => $row['phong_ban_id'],
            'id_jobTitle' => $row['chuc_vu'],
            'available' => 1,
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
