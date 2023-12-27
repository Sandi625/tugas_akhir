@extends('layouts.main')

@section('konten')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
@php
$user = Auth::user(); // Mendapatkan data pengguna dari sistem otentikasi Laravel
$perPage = 6; // Jumlah produk per halaman
$pageCount = ceil(count($products) / $perPage); // Menghitung jumlah halaman
$page = request()->get('page', 1); // Mendapatkan nomor halaman saat ini dari query string (default: 1)
@endphp


<h1>Daftar Produk</h1>
<div class="d-flex flex-row flex-wrap">
    @foreach($products->forPage($page, $perPage) as $product)
        <div class="card" style="width: 18rem; margin-left: 50px;">
            <img src="{{ asset('fotoproduk/' . $product->image) }}" class="card-img-top img-fluid" alt="Product Image" style="max-height: 200px; width: auto;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ Str::limit($product->description, 10) }}</p>
                <p class="card-text">Nama Barang: {{ $product->product_name }}</p> <!-- Add Product Name -->
                <p class="card-text">Kode Barang: {{ $product->product_code }}</p> <!-- Add Product Code -->
                <p class="card-text">Price: ${{ $product->price }}</p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#descriptionModal{{ $product->id }}">Deskripsi</a>
            </div>
        </div>
        <!-- Rest of the code remains unchanged -->




                <!-- Modal Deskripsi untuk setiap produk -->
                <div class="modal fade" id="descriptionModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="descriptionModalLabel{{ $product->id }}">{{ $product->name }} - Deskripsi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="pagination">
                    <li class="page-item {{ ($page == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="?page={{ $page - 1 }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $pageCount; $i++)
                        <li class="page-item {{ ($page == $i) ? 'active' : '' }}">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ ($page == $pageCount || $pageCount == 0) ? 'disabled' : '' }}">
                        <a class="page-link" href="?page={{ $page + 1 }}">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div>
@endsection
