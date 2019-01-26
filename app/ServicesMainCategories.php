<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesMainCategories extends Model
{
    protected $hidden = ['pivot'];
    public function labels ()
    {
        return $this->belongsToMany('App\ServicesMainlabel', 'services_mainlabel_rs',
            'id_services_categories', 'id_services_mainlabels');
    }
}
