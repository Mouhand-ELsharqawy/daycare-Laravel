<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'employees_id', 'programname', 'programdate', 'departmentphone', 'location'];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
