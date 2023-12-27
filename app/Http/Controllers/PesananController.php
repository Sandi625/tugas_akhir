<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(Request $request){
        if($request->has("search")){
            $data = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }



        return view ("pesanan",compact("data"));
    }
}
