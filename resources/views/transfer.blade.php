@extends('layouts.main')

@section('konten')
<link rel="stylesheet" href="/css/transfer.css">

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

        <!-- HTML content -->
        <div class="container">
            <div class="back-button">
                <a href="/pegawai">Kembali</a>
            </div>
            <div class="card">
                <a href="/bca">
                    <img src="/img/2.png" alt="Gambar 1">
                    <div class="card-content">
                        <h3>Transfer menggunakan BCA</h3>
                        <p>Anda bisa transfer menggunakan BCA.</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="/bni">
                    <img src="/img/1.png" alt="Gambar 2">
                    <div class="card-content">
                        <h3>Transfer Menggunakan BNI</h3>
                        <p>Anda bisa transfer menggunakan BNI.</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="/bri">
                    <img src="/img/3.jpg" alt="Gambar 3">
                    <div class="card-content">
                        <h3>Transfer Menggunakan BRI</h3>
                        <p>Anda bisa transfer menggunakan BRI.</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Upload Form -->
        <div class="upload-form">
            <h3>Unggah Bukti Transfer</h3>
            <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
                @csrf <!-- Add CSRF token -->
                <input type="file" name="bukti" id="bukti_transfer">
                <input type="submit" value="bukti">
            </form>
        </div>
    </div>
@endsection
