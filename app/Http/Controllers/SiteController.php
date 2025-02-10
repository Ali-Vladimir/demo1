<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('index');
    }
    public function services(){
        $services = Service::all();
        return view('services', compact('services'));
    }
    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }
}
