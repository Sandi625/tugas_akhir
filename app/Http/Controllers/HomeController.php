<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index(){
    //     return view("home");
    // }
public function abc()
{
    return view("helloworld");
}

public function biodata()
{
    return view("biodata");
}
}
