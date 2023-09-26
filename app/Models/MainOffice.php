<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainOffice extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'employees_id'];
    
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
