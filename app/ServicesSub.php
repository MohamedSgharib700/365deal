<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesSub extends Model
{
    protected $hidden = ['pivot'];
    
    public function mainiamge()
    {
        return $this->hasMany('App\ServicesSubImage', 'id_services_sub', 'id');
    }
    public function Address()
    {
        return $this->belongsTo('App\Address',
            'id_address', 'id');
    }

    public function specialdetails()
    {
        return $this->belongsTo('App\ServicesIcan',
            'id_address', 'id');
    }

     public function images()
    {
        return $this->hasMany('App\ServicesSubImage', 'id_services_sub', 'id');        
    }

    public function categgory()
    {
        return $this->belongsTo('App\ServicesMainCategories',
            'id_categories', 'id');
    }
  
}
