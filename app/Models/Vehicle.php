<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = ['inventory_name', 'driver_id', 'user_id', 'short_name'];
}
