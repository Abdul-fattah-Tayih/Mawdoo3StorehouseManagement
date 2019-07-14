<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $analytics = array([
            'total_products'    => \App\Product::all()->count(),
            'total_categories'  => \App\Category::all()->count(),
            'total_users'       => \App\User::all()->count()
        ]);
        return view('index')->with(compact('analytics'));
    }
}
