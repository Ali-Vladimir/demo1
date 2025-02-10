<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeLandController extends Controller
{
    public function index(){
        return view('homeland.index');
    }
    public function about(){
        return view('homeland.about');
    }
    public function contact(){
        return view('homeland.contact');
    }
    public function login(){
        return view('homeland.login');
    }
    public function buy(){
        return view('homeland.buy');
    }
    public function rent(){
        return view('homeland.rent');
    }

}
