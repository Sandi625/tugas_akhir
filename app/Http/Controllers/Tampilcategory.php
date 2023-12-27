<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_categories;

class Tampilcategory extends Controller
{
    public function tampilcategory()
    {
        $categories = Product_categories::all();


        // Pass the categories to the view
         return view('welcome')->with('categories', $categories);
    }
}
