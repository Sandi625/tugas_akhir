<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BRIController extends Controller
{
    public function index(){
        return view('Bank.bri');
    }
}
