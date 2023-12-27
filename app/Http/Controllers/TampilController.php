<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class TampilController extends Controller
{
    public function index()
    {
        // Fetch products data from the database
        $products = Products::with('product_categories')->paginate(5);

        // Pass the products data to the view
        return view("tampil", compact("products"));
    }
}
