<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    public $timestamps = false;
    protected $primaryKey = 'id_admin';

    public function getAdminNameAttribute()
    {
        if ($this->role == 0) {
            return "SuperAdmin";
        } else {
            return "Admin";
        }
    }
}
