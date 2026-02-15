<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function index()
    {
        return view(view: 'web.index');
    }

    public function projects(){
        return view('web.projects');
    }
}
