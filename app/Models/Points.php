<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $table='points_of_sales';
    protected $fillable=['point','id_lang'];
}
