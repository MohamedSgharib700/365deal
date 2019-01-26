<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catag extends Model
{
    public function catlan()
    {
        return $this->hasOne('App\catagsLan',
            'id_catags', 'id');
    }
}
