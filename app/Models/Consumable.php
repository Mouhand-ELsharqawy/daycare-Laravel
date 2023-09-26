<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fingerpaint', 'paper', 'cleaningsupplies', 'sippycubs', 'spoons', 'crayons', 'garbagebag', 'diabers', 'forks', 'penciles', 'bowls', 'babywipes'];
}
