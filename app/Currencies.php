<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    public function Range()
    {
        return $this->hasMany('App\RangPrice',
            'id_currencies', 'id');
    }
}
