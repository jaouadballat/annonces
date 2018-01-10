<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Company extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function scopeSearchCompany($query)
    {
    	if (request('company')) {
             $query->where('name', 'like', '%'. request('company') .'%')
            			 ->get();
        }
        if (request('city')) {
             $query->where('city_id', '=', request('city'))->get();
        }
        if (request('category')) {
            $query->where('category_id', '=', request('category'))->get();
        }

        return $query;
    }
}
