<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateingOffer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User',
            'id_user', 'id');
    }

    public function offer()
    {
        return $this->belongsTo('App\Magazin_offer',
            'id_offer', 'id');
    }
}
