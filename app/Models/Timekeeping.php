<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Timekeeping extends Model
{
    protected $table = 'timekeeping';
    public $timestamps = false;
    protected $primaryKey = 'id_timekeeping';
    protected $fillable = [
        'id_timekeeping',
        'id_employee',
        'checkin',
        'checkout',
        'date',
        'phat',
    ];

    public function getCheckAttribute()
    {
        if ($this->checkout == '') {
            return 'Null';
        }
    }
}
