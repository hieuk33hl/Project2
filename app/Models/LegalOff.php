<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalOff extends Model
{
    protected $table = 'legal_off';
    public $timestamps = false;
    protected $primaryKey = 'id_legal';
    protected $fillable = [
        'id_legal',
        'reason',
        'id_employee',
        'strat_time_off',
        'end_time_off',
        'note',
    ];
    public function getNameApproveAttribute()
    {
        if ($this->approve == 0) {
            return 'Duyệt';
        } else if ($this->approve == 1) {
            return 'Từ chối';
        } else if ($this->approve == null) {
            return 'Chờ';
        }
    }
}
