<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesSubRate extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User',
            'id_user', 'id');
    }
}
