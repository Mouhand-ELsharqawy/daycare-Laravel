<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaleParent extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fathername', 'fatherfamilyname', 'fmobile', 'ftelephone', 'fpostcode', 'faddress'];
    public function children(){
        return $this->hasMany(Children::class);
    }
}
