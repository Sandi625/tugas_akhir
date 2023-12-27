<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BCAController extends Controller
{
  public function index(){
    return view('bank.bca');
  }
}
