<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinEmployeeFam extends Model
{
    protected $table = 'vaksin_employee_fams';
    protected $guarded = ['id'];

    function vaksin_header()
    {
        return $this->belongsTo(VaksinEmployee::class, 'vaksin_employee_id','id');
    }
}
