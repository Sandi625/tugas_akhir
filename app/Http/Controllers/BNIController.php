<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BNIController extends Controller
{
    public function index(){
        return view('Bank.bni');
    }
}
