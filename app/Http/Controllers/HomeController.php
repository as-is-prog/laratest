<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $myProjects = Auth::user()->myProjects();
        $joiningProjects = Auth::user()->joiningProjects();
        return view('home' ,['myProjects' => $myProjects, 'joiningProjects' => $joiningProjects]);
    }
}
