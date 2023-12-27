<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuktiTransfer;

class BuktiTFCstmr extends Controller
{
    public function index()
    {
        $buktiTransfer = BuktiTransfer::all(); // Mengambil semua data dari model BuktiTransfer

        return view('buktiTF', compact('buktiTransfer'));
}
}
