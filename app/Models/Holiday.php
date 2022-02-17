<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holiday';
    public $timestamps = false;
    protected $primaryKey = 'id_holiday';
    protected $fillable = ['name_holiday', 'date_holiday'];
}
