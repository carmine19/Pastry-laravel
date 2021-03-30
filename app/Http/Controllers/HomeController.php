<?php

namespace App\Http\Controllers;

use App\Sweet;
Use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sweets = Sweet::all();
        $data = new Carbon();

        return view('home', compact('sweets', 'data'));
    }

    public function show($slug) {

        $sweets = Sweet::where('slug', $slug)->first();
        $data = new Carbon();
       
        return view('single-product', compact('sweets', 'data'));
  
    }


}
