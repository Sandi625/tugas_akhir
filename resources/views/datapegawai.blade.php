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
        <style>.btn-orange {
            background-color: orange;
            margin-left: 30px;
            /* Tambahan gaya lain yang Anda butuhkan */
        }
        </style>


        <div class="container">
            <a href="/tambahbarang" class="btn btn-success">Tambah</button> </a>  <a href="/transfer" class="btn btn-orange">Transfer</a>


            <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                    <form action="/pesanbarang" method="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control"
                            aria-describedby="passwordHelpInline">
                </div>
                </form>
            </div>


            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Nama barang</th>
                            <th scope="col">Kode barang</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Desa dan jalan</th>
                            <th scope="col">RT/RW</th>
                            <th scope="col">Foto_KTP</th>
                            <th scope="col">Aksi</th>

                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jeniskelamin }}</td>
                                <td>0{{ $row->notelpon }}</td>
                                <td>{{ $row->created_at->format('D M Y') }}</td>
                                <td>{{ $row->nama_barang }}</td>
                                <td>{{ $row->kode_barang }}</td>
                                <td>{{ $row->provinsi }}</td>
                                <td>{{ $row->kota }}</td>
                                <td>{{ $row->desa }}</td>
                                <td>{{ $row->RT_RW }}</td>
                                <td>
                                    @if (is_array($row->foto))
                                        @foreach ($row->foto as $filename)
                                            <img src="{{ asset('fotopegawai/' . $filename) }}" alt=""
                                                style="width: 90px">
                                        @endforeach
                                    @else
                                        <img src="{{ asset('fotopegawai/' . $row->foto) }}" alt=""
                                            style="width: 90px">
                                    @endif
                                </td>

                                <td>

                                    <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit </a>
                                    <a href="/delete/{{ $row->id }}" class="btn btn-danger"
                                        onclick="return confirm('Apa Anda Yakin untuk Hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}

            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    </div>
@endsection
