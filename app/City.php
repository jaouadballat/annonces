<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    public function companies()
    {
    	return $this->hasMany('App\Company');
    }

    public function categories()
    {
    	return $this->hasManyThrough('App\Category', 'App\Company');
    }
}
