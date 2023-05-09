<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    protected $table = 'premium';
    protected $fillable = ['premium_plan', 'price', 'price_invite_code', 'duration'];
}
