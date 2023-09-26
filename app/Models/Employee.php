<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'address', 'salary', 'maritalstatus', 'socialsecurity', 'education', 'startdate', 'enddate'];
    public function option(){
        return $this->hasMany(CurriculumOption::class);
    }
    public function main(){
        return $this->hasMany(MainOffice::class);
    }
    public function program(){
        return $this->hasMany(Program::class);
    }
}
