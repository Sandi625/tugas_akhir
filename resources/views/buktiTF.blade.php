@extends('layouts.admin') <!-- Adjust with the name of the layout you're using -->

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

        <!-- HTML content -->
        <!DOCTYPE html>
        <html>
        <head>
            <title>Bukti Transfer Pengguna</title>
        </head>
        <body>
            <h1>Bukti Transfer Pengguna</h1>

            @if($buktiTransfer->isEmpty())
                <p>Tidak ada bukti transfer untuk ditampilkan.</p>
            @else
                <div class="bukti-transfer-container">
                    @foreach($buktiTransfer as $bukti)
                        <div class="bukti-transfer-item">
                            <img src="{{ asset('fototransfer/' . $bukti->bukti) }}" alt="Bukti Transfer">
                            <!-- Add additional details or information if needed -->
                        </div>
                    @endforeach
                </div>
            @endif
        </body>
        </html>
    </div>
@endsection
