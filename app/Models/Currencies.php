<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    protected $table = 'currency';
    protected $fillable = ['currency_name', 'currency_symbol'];
}
