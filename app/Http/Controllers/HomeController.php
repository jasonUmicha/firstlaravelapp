<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index():string
    {
        return view('welcome');
    }

    public function about():string
    {
        return view('about');
    }

    public function contact():string
    {
        return view('contact');
    }

    public function pipi():string
    {
        return view('pipi');
    }

    public function return():string
    {

        return view('welcome');
    }


}
