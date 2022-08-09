<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinEmployee extends Model
{
    protected $table = 'vaksin_employees';
    protected $guarded = ['id'];
    
    public function vaksin_detail()
    {
        return $this->hasMany(VaksinEmployeeFam::class, 'vaksin_employee_id', 'id');
    }
}
