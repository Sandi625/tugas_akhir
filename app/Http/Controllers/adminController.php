<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
public function admin() {
    return view('pages.master');
}

public function anime() {
    return view('pages.master2');
}
}
