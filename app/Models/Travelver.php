<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travelver extends Model
{
    protected $table = 'travelvers_manifest_data';
    protected $fillable = ['passenger_name','passenger_mobile_number','name_next_kind','mobile_number_next_kind'];
}
