<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuggageType extends Model
{
    protected $table = 'luggage';
    protected $fillable = ['luggage_name'];
}
