<?php

namespace App\Http\Controllers;

use App\Models\BuktiTransfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index(){
        return view('transfer');
    }

    public function store(Request $request)
    {
        // Validasi input, jika diperlukan
        $validatedData = $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);

        // Simpan file ke dalam folder fototransfer
        if ($request->hasFile('bukti')) {
            $image = $request->file('bukti');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('fototransfer'), $imageName);

            // Simpan informasi file ke dalam basis data
            $data = new BuktiTransfer();
            $data->bukti = $imageName;
            $data->save();
        }

        // Redirect atau respon sesuai kebutuhan aplikasi Anda
        return redirect()->route('transfer.store')->with('success', 'Data berhasil disimpan');

}
}
