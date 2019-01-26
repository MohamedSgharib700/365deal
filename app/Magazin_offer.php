<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazin_offer extends Model
{
    public function comment()
    {
        return $this->hasMany('App\commentOffer',
            'id_offer', 'id');
    }

    public function pages()
    {
        return $this->hasMany('App\Pages',
            'id_magazin_offers', 'id');
    }

    public function RateingOffer()
    {
        return $this->hasMany('App\RateingOffer',
            'id_offer', 'id');
    }

    public function Market()
    {
        return $this->belongsTo('App\Market',
            'id_market', 'id');
    }
}
