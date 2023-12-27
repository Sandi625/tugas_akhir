<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(Request $request){
        if($request->has("search")){
            $data = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }



        return view ("datapegawai",compact("data"));
    }


    public function tambahpegawai(){
        return view ("tambahdata");
    }



    public function insertdata(Request $request){
        // dd($request->all());


        $data= Employee::create($request->all());
        if($request->hasFile("foto")){
            $request->file('foto')->move('fotopegawai/',$request->file('foto')->getClientOriginalName());
$data->foto = $request->file('foto')->getClientOriginalName();
$data->save();
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Ditambahkan');

    }




    public function tampilkandata($id){

$data = Employee::find($id);
// dd($data);

return view('tampildata',compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);

        // Memperbarui data berdasarkan permintaan
        $data->update($request->all());

        // Memeriksa apakah ada file foto yang diunggah dalam permintaan
        if($request->hasFile("foto")){
            // Mendapatkan file yang diunggah
            $uploadedFile = $request->file('foto');

            // Pindahkan file yang diunggah ke direktori yang diinginkan (fotopegawai/)
            $filePath = 'fotopegawai/';
            $fileName = $uploadedFile->getClientOriginalName();
            $uploadedFile->move($filePath, $fileName);

            // Memperbarui kolom 'foto' dengan nama file yang baru diupdate
            $data->foto = $fileName;
            $data->save();
        }

        // Mengarahkan pengguna kembali ke rute 'pegawai' dengan pesan sukses
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Edit');
    }

    public function delete($id) {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','data berhasil dihapus');
    }
}
