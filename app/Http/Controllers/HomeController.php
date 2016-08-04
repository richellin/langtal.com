<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        parent::__construct();
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
    
    public function locale()
    {
        $cookie = cookie()->forever('lang', request('locale'));
        cookie()->queue($cookie);

        return ($return = request('return'))
            ? redirect(urldecode($return))->withCookie($cookie)
            : redirect(route('home'))->withCookie($cookie);
    }
}
