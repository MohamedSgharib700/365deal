<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesSubcomment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User',
            'id_user', 'id');
    }
}
