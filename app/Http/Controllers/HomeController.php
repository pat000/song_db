<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $songs = DB::table('songs') 
                ->select("id")->count();

        $users = DB::table('users') 
                ->select("id")->count();

        return view('home',compact('songs', 'users' ));
    }
}
