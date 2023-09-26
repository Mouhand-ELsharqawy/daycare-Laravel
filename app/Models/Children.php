<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','male_parents_id', 'female_parents_id', 'name', 'gender', 'dob', 'class', 'currentlocation'];
    protected $table = 'childrens';
    public function child(){
        return $this->hasMany(Child::class);
    }
    public function femaleparent(){
        return $this->belongsTo(FemaleParent::class);
    }
    public function maleparent(){
        return $this->belongsTo(MaleParent::class);
    }
}
