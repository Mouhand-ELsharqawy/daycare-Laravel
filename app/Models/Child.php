<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable = ['id','childrens_id', 'nappinghours', 'food', 'extrainfo', 'behavior', 'playinglocation', 'vaccine'];
    public function children(){
        return $this->belongsTo(Children::class);
    }
}
