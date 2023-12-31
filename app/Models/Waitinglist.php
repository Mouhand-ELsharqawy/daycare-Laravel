<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waitinglist extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'familyname', 'address', 'phone', 'comments', 'dateplacement'];
}
