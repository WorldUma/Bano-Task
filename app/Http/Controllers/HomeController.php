<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('dashboard')->with('user',$user);
    }
}
