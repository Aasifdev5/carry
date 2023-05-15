<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLimitation extends Model
{
    protected $table = 'user_limitation';
    protected $fillable = ['user_type', 'chat_limit', 'add_offer_limit', 'swipe_limit'];
}
