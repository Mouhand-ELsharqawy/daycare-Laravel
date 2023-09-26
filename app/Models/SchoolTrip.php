<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolTrip extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'chaperone', 'schoollocation', 'cost', 'comments'];
}
