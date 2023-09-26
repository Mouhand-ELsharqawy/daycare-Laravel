<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FemaleParent extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'mothername', 'motherfamilyname', 'mmobile', 'mtelephone', 'mpostcode', 'maddress'];
    public function children(){
        return $this->hasMany(Children::class);
    }
}
