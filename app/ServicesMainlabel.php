<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesMainlabel extends Model
{
    protected $hidden = ['pivot'];
    
    public function Attribut()
    {
        return $this->hasMany('App\ServicesMainlabalAttribut', 'id_label', 'id');
    }

    public function textvalue()
    {
    return $this->hasManyThrough(
        'App\ServicesValText',
        'App\ServicesMainlab_Val',
        'id_label', 
        'id_value', 
        'id', 
        'id');
    }

    public function value()
    {
        return $this->hasOne('App\ServicesMainlab_Val', 'id_label', 'id');
    }
}
