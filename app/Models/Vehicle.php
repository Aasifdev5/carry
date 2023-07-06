<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
     protected $table = 'vehicles';
     protected $fillable = ['vehicle_name', 'nick_name', 'vehicle_photo_name','type','driver_photo','photo_type', 'ride_type', 'transport_type','cargo_type', 'seats', 'departure_address', 'destination_address', 'fixed_price','currency', 'destination_type','luggage_type', 'description'];
}
