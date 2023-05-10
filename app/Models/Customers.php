<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name', 'is_admin', 'email', 'password', 'distributor_name', 'invite_code', 'start_date', 'end_date'];
}
