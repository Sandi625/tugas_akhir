<?php

namespace App\Http\Controllers;

use App\Models\Product_categories;
use App\Models\Products;
use Illuminate\Http\Request;



class DasborController extends Controller
{
    public function tampilkanDasbor()
    {
        $totalProduk = Products::count();
        $categories = Product_categories::all();


        // Menghitung total semua harga product
        $totalPrice = Products::sum('price');


        // Menghitung totral stock dari semua product
        $totalStock = Products::sum('stock');


        //buat variable untuk digunakan di view
        return view('welcome')->with([
            'totalProduk' => $totalProduk,
            'categories' => $categories,
            'totalPrice' => $totalPrice,
            'totalStock' => $totalStock,
        ]);
    }
}


