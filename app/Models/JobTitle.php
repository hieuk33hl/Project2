<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'jobtitle';
    public $timestamps = false;
    protected $primaryKey = 'id_jobTitle';
}
