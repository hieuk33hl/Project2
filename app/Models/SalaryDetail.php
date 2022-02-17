<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryDetail extends Model
{
    use HasFactory;
    protected $table = 'salary_detail';
    public $timestamps = false;
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_employee', 'fromdate', 'todate', 'salary', 'id_jobTitle', 'id_level'];
}
