<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud Laravel!</title>
</head>

<body>
    @include('layouts.pesan')
    <h1 class="text-center mb-4">Tambah data produk</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertproduk" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Nama Produk">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="1">id 1: Sports</option>
                                    <option value="2">id 2: Daily</option>
                                    <option value="3">id 3: Accessories</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="product_code" class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Enter Kode Produk">
                            </div>
                            <div class="mb-3">
                                <label for="is_active" class="form-label">Aktif</label>
                                <select class="form-select" name="is_active" id="is_active">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="created_at" class="form-label">Tanggal</label>
                                <input type="datetime-local" class="form-control" name="created_at" id="created_at" placeholder="Tanggal">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Deskripsi">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Enter Harga">
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="text" class="form-control" name="unit" id="unit" placeholder="Enter Unit">
                            </div>
                            <div class="mb-3">
                                <label for="discount_amount" class="form-label">Diskon</label>
                                <input type="text" class="form-control" name="discount_amount" id="discount_amount" placeholder="Enter Diskon">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter Stock">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="image">
                            </div>




                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

</body>

</html>
