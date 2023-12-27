<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_categories;
use App\Models\Products;

class ChartController extends Controller
{
    public function chart()
    {
        // Ambil semua kategori
        $categories = Product_categories::all();

        // Inisialisasi array untuk menyimpan jumlah produk per kategori
        $productsPerCategory = [];

        // Inisialisasi array untuk menyimpan total harga produk per kategori
        $totalPricePerCategory = [];

        // Inisialisasi array untuk menyimpan jumlah stok produk per kategori
        $stockPerCategory = [];

        // Hitung jumlah produk per kategori, total harga produk per kategori, dan jumlah stok produk per kategori
        foreach ($categories as $category) {
            $productsPerCategory[$category->category_name] = Products::where('category_id', $category->id)->count();
            $totalPricePerCategory[$category->category_name] = Products::where('category_id', $category->id)->sum('price');
            $stockPerCategory[$category->category_name] = Products::where('category_id', $category->id)->sum('stock');
        }
        return view('highchart', [
            'productsPerCategory' => $productsPerCategory,
            'totalPricePerCategory' => $totalPricePerCategory,
            'stockPerCategory' => $stockPerCategory // Mengirim data jumlah stok produk per kategori ke tampilan
        ]);
    }
}
