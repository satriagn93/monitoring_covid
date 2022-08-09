<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $table = 'covids';
    protected $guarded = ['id'];
    

    public function employee()
    {
        return $this->hasMany(Employee::class, 'id','employee_id');
    }
}
