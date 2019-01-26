<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['titles', 'descs','types', 'images', 'lan', 'lat', 'nashoniltes', 'sitys', 'strs', 'prics', 'mails', 'phones', 'timeOfvers', 'created_at', 'updated_at'];
}
