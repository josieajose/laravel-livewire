<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function packages()
    {
        return view('packages');
    }

    public function home()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect('/login');
    }
}
