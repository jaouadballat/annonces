<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = \App\Category::take(8)->get();
    	$cities = \App\City::all();

    	return view('home', compact('categories', 'cities'));
    }
}