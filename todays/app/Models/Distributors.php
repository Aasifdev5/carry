<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributors extends Model
{
    protected $table = 'distributors';
    protected $fillable = ['distributor_name', 'invite_code', 'start_date', 'end_date', 'distributor_email', 'password'];
}
