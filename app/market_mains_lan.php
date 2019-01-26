<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class market_mains_lan extends Model
{
    protected $fillable = ['id_market_mains','id_language'];


    public function MarketMain()
    {
        return $this->belongsTo('App\MarketMain',
            'id_market_mains', 'id');
    }

    public function language()
    {
        return $this->belongsTo('App\language',
            'id_language', 'id');
    }
}
