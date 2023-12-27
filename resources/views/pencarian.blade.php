<!-- pencarian.blade.php -->

@extends('layouts.admin') <!-- Sesuaikan dengan nama layout yang Anda gunakan -->

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <!-- Formulir Pencarian -->
      <!-- Formulir Pencarian -->
<form action="{{ route('cari') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan nama produk...">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>
<!-- Hasil Pencarian -->
@if($data->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Kode Produk</th>
                <th>Aktif</th>
                <th>Tanggal Buat dan Update</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Unit</th>
                <th>Diskon</th>
                <th>Stock</th>
                <th>Gambar_Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->product_name }}</td>
                    <td>{{ $row->product_categories->category_name }}</td>
                    <td>{{ $row->product_code }}</td>
                    <td>{{ $row->is_active }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->price }}</td>
                    <td>{{ $row->unit }}</td>
                    <td>{{ $row->discount_amount }}</td>
                    <td>{{ $row->stock }}</td>
                    <td>
                        @if(!empty($row->image))
                            @php
                                $imagePaths = explode(',', $row->image);
                            @endphp

                            @foreach($imagePaths as $filename)
                                <img src="{{ asset('fotoproduk/' . trim($filename)) }}" alt="" style="width: 90px">
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@else
    <p>Tidak ditemukan hasil pencarian.</p>
@endif

    </div>
@endsection
