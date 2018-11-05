<?php

namespace App\Http\Controllers;

use LaraFlash;
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
        LaraFlash::add()->content('Hello World')->priority(6)->type('info');
        LaraFlash::snackbar('Click to continue')->priority(3);
        LaraFlash::success('Yey it works');
        LaraFlash::danger('Opps something is wrong');
        return view('home');
    }
}
