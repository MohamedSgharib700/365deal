<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketMain extends Model
{

    protected $fillable = ['id_address','email','phone','id_market_mains'];

    public function logo()
    {
        return $this->hasOne('App\logomarket',
            'id_market_main', 'id');
    }
    public function name()
    {
        return $this->hasOne('App\market_mains_lan',
            'id_market_mains', 'id');
    }
    public function Marketsub()
    {
        return $this->hasMany('App\Market',
            'id_market_mains', 'id');
    }



}
