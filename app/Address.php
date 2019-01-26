<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function Address()
    {
        return $this->hasOne('App\Address',
            'id_p', 'id');
    }

    public function Address_p()
    {
        return $this->belongsTo('App\Address',
            'id_p', 'id');
    }

    public function currencies()
    {
        return $this->hasOne('App\Currencies',
            'id_address', 'id');
    }


}
