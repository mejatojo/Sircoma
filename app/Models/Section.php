<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable=['titre','paragraphe','id_lang','reference'];
}
