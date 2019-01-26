<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesMain extends Model
{
    public function ServicesSub ()
    {
        return $this->hasMany('App\ServicesSub', 'id_servicesMain', 'id');
    }

    public function ServicesMainlabel ()
    {
        return $this->belongsToMany('App\ServicesMainlabel', 'services_mainlabel_rs',
            'id_services_main', 'id_services_mainlabels');
    }

    public function name()
    {
        return $this->hasOne('App\ServicesMainLang', 'id_services_main', 'id');
    }

    public function classname()
    {
        return $this->belongsTo('App\ServicesMainclass', 'id_class', 'id');
    }

    public function color()
    {
        return $this->belongsTo('App\ServicesMaincolor', 'id_color', 'id');
    }

    public function finalican()
    {
        return $this->hasMany('App\ServicesIcan', 'id_services', 'id');
    }


}
