<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Admin</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row w-100 bg-info rounded align-items-center px-3">
            <div class="col">
                <div class="my-4 me-5">
                    <h2 class="fw-semibold text-left mx-3">List Products</h2>
                </div>
            </div>
            <div class="col-auto ms-auto mt-2 mx-3">
                <a class="btn btn-primary fw-bold" data-bs-toggle="offcanvas" href="{{ route('merchant_profile.index', ['id'=>16])}}" role="button" aria-controls="offcanvasExample">Lihat Profil</a>
                <a class="btn btn-dark fw-bold" data-bs-toggle="offcanvas" href="{{ route('merchant.create', ['id'=>16]) }}" role="button" aria-controls="offcanvasExample">Tambah Produk</a>
                <a class="btn btn-secondary fw-bold" href="{{ route('products.index') }}" role="button">Kembali ke Produk</a>
            </div>
            <div class="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="px-5">No</th>
                            <th class="px-5">Nama</th>
                            <th class="px-5">Stok</th>
                            <th class="px-5">Berat</th>
                            <th class="px-5">Harga</th>
                            <th class="px-5">Kondisi</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="px-5" scope="row">{{ $loop->iteration }}</td>
                            <td class="px-5">{{ $product->namaProduk }}</td>
                            <td class="px-5">{{ $product->stok }}</td>
                            <td class="px-5">{{ $product->berat }}</td>
                            <td class="px-5">Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="px-5">
                                <button class="w-100 btn btn-{{ $product->kondisi == 'Bekas' ? 'dark' : 'success' }} text-{{ $product->kondisi == 'Bekas' ? 'white' : 'dark' }} rounded">{{ $product->kondisi }}</button>
                            </td>                                                      
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('merchant.update', ['userId' => $userId, 'product' => $product->id]) }}" class="btn btn-warning me-1">Update</a>
                                    <form action="{{ route('merchant.delete', ['userId' => $userId, 'productId' => $product->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>