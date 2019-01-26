<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = ['id'];

    public function MarketMain()
    {
        return $this->belongsTo('App\MarketMain',
            'id_market_mains', 'id');
    }

    public function Address()
    {
        return $this->belongsTo('App\Address',
            'id_address', 'id');
    }


    public function Magazin_offer()
    {
        return $this->hasMany('App\Magazin_offer',
            'id_market', 'id');
    }
}
