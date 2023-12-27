<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin1Controller extends Controller
{
   public function index(){
    return view('datapegawai');

    }
    function operator(Request $request){
        if($request->has("search")){
            $data = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }



        return view ("datapegawai",compact("data"));
    }
    function keuangan(){
        echo "Halo, selamagt datang keuangn";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }

    function marketing(){
        echo "Halo, selamagt datang markeying";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
}
