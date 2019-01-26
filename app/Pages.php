<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public function pages()
    {
        return $this->belongsTo('App\catag',
            'id_catags', 'id');
    }
}
