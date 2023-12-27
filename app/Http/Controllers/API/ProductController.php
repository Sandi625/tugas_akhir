<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
 public function index(){
    $product = Products::all();

        return response()->json([
            'status'=>'succsess',
            'message'=>'Data di temukan',
            'data'=>$product,

        ]);


    }


 public function show($id){
    $product = Products::find($id);
    if ($product){
        return response()->json([
            'status'=>'succsess',
            'message'=>'Data di temukan',
            'data'=>$product,

        ]);

    }else{
        return response()->json([
            'status'=>'error',
            'message'=>'Data di tidak temukan',
            'data'=>null,

        ],404);

    }

 }
public function store(Request $request){
$validate = Validator::make($request->all(),[
    'product_name' => 'required|string|min:3|max:60',
            'category_id' => 'required|exists:product_categories,id',
            'product_code' => 'required|string|max:50|unique:products,product_code',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'discount_amount' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',

]);
if ($validate->fails()){
    return response()->json([
        'status'=> 'error',
        'message'=> 'Data tidak valid',
        'data' => null,
    ],442);
}
    $products = Products::create([
       'product_name'=>$request->product_name,
       'category_id'=>$request->category_id,
       'product_code'=>$request->product_code,
       'description'=>$request->description,
       'price'=>$request->price,
       'unit'=>$request->unit,
       'discount_amount'=>$request->discount_amount,
       'stock'=>$request->stock,

    ]);
    return response()->json([
        'status'=>'success',
    'message'=> 'Data berhasil di dibuat',
    'data'=> $products
    ]);
}

public function update(Request $request, $id){
    $validate = Validator::make($request->all(),[
        'product_name' => 'required|string|min:3|max:60',
                'category_id' => 'required|exists:product_categories,id',
                'product_code' => 'required|string|max:50|unique:products,product_code',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'unit' => 'required|string|max:50',
                'discount_amount' => 'nullable|numeric|min:0',
                'stock' => 'required|integer|min:0',

    ]);
    if ($validate->fails()){
        return response()->json([
            'status'=> 'error',
            'message'=> 'Data tidak valid',
            'data' => $validate->errors(),
        ],442);
    }

    $products = Products::where('id',$id)->update([
        'product_name'=>$request->product_name,
        'category_id'=>$request->category_id,
        'product_code'=>$request->product_code,
        'description'=>$request->description,
        'price'=>$request->price,
        'unit'=>$request->unit,
        'discount_amount'=>$request->discount_amount,
        'stock'=>$request->stock,

     ]);

     if($products){
        $products = Products::find($id);
        return response()->json([
            'status'=>'success',
            'message'=>'data berhasil di update',
            'data'=>$products
        ]);
     }


}
public function destroy($id){
    $product = Products::find($id);
    if (!$product) {
        return response()->json([
            'status'=>'error',
            'message'=> 'data tidak ditemukan',
            'data'=>null,

        ],442);
    }
    $product->delete();
    return response()->json([
            'status'=>'success',
            'message'=> 'data berhasil di hapus',
            'data'=>null,

        ]);

    }


    }

