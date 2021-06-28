<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products_langue extends Model
{
    protected $fillable=['id_product','id_lang','name_product','description_product','price'];
}
