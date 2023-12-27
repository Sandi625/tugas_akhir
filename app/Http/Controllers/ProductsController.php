<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ProductsController extends Controller
{
    public function products()
    {

        $data = Products::with('product_categories')->paginate(5);

        return view("dataproduk", compact("data"));
    }

    public function tambahproduk()
    {
        return view("tambahproduk");
    }

    public function insertproduk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|min:3|max:60',
            'category_id' => 'required|exists:product_categories,id',
            'product_code' => 'required|string|max:50|unique:products,product_code',
            'is_active' => 'required|boolean',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'discount_amount' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'product_name.required'=>'Nama Produk wajib di isi',
            'category_id.required'=>'Kategori ID wajib di isi',
            'product_code.required'=>'Kode Produk wajib di isi',
            'is_active.required'=>'Status Produk wajib di isi',
            'description.required'=>'Status Produk wajib di isi',
            'price.required'=>'Harga Produk wajib di isi',
            'unit.required'=>'Unit wajib di isi',
            'stock.required'=>'Harga Produk wajib di isi',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Products::create($request->all());

        if ($request->hasFile("image")) {
            $request->file("image")->move("fotoproduk/", $request->file("image")->getClientOriginalName());
            $data->image = $request->file("image")->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('products')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilproduk($id)
    {

        $data = Products::find($id);
        // dd($data);

        return view('tampilproduk', compact('data'));
    }

    public function updateproduk(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|min:3|max:60',
            'category_id' => 'required|exists:product_categories,id',
            'product_code' => 'required|string|max:50|unique:products,product_code,'.$id,
            'is_active' => 'required|boolean',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'discount_amount' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'product_name.required'=>'Nama Produk wajib di isi',
            'category_id.required'=>'Kategori ID wajib di isi',
            'product_code.required'=>'Kode Produk wajib di isi',
            'is_active.required'=>'Status Produk wajib di isi',
            'description.required'=>'Deskripsi Produk wajib di isi',
            'price.required'=>'Harga Produk wajib di isi',
            'unit.required'=>'Unit wajib di isi',
            'stock.required'=>'Stok Produk wajib di isi',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = Products::findOrFail($id);

            $updateData = $request->except(['image', '_token', '_method']);

            if ($request->hasFile("image")) {
                $imagePath = 'fotoproduk/';
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move($imagePath, $imageName);
                $updateData['image'] = $imageName;
            }

            $data->update($updateData);

            return redirect()->route('products')->with('success', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('products')->with('error', 'Ada kesalahan input ke database');
        }
    }



    public function deleteproduk($id)
    {
        $data = Products::find($id);
        $data->delete();
        return redirect()->route('products')->with('success', 'data berhasil dihapus');
    }


    public function cari(Request $request)
    {
        if ($request->has("search")) {
            $data = Products::where('product_name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Products::paginate(5);
        }



        return view("pencarian", compact("data"));
    }
}
