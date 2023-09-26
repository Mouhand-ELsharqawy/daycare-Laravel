<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumOption extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'employees_id', 'season', 'agegroup', 'numberofdays', 'hoursperweek', 'description'];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
