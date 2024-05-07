<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Products</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row w-100 bg-info rounded align-items-center">
            <div class="col-auto">
                <a class="btn btn-primary fw-bold" data-bs-toggle="offcanvas" href="{{ route('admin.list-products', ['id'=>12]) }}" role="button" aria-controls="offcanvasExample">Halaman Pengguna Admin</a> 
            </div>
            <div class="col mt-1 me-4">
                <div class="my-4">
                    <h1 class="fw-bold text-center">PRODUCTS</h1>
                    <div class="border border-top border-black mx-auto mt-3" style="width: 100px"></div>
                </div>
            </div>
            <div class="col-auto">
                <a class="btn btn-success fw-bold" data-bs-toggle="offcanvas" href="{{ route('merchant.list-products', ['id'=>16]) }}" role="button" aria-controls="offcanvasExample">Halaman Pengguna Merchant</a> 
            </div>
            <div class="grid mt-4 mx-2">
                <div class="row row-gap-4">
                    @foreach ($products as $product)
                    <div class="col-3">
                        <div class="card mb-3" style="width: 18rem;">
                            <div class="card-body">
                                <img src="{{ $product->gambar }}" class="card-img-top" alt="{{ $product->namaProduk }}">
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold fs-4 mt-3">{{ $product->namaProduk }}</p>
                                    <p class="bg-{{ $product->kondisi == 'Bekas' ? 'warning' : 'success' }} px-2 py-1 mt-3 rounded fw-semibold my-auto">{{ $product->kondisi }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="bg-success mt-1 px-2 py-1 rounded fw-semibold my-auto text-white">{{ $product->stok }}</p>
                                    <p class="bg-info mt-1 px-2 py-1 rounded fw-semibold my-auto">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
                                    <p class="bg-secondary mt-1 px-2 py-1 rounded fw-semibold my-auto text-white">{{ $product->berat }} gr</p>
                                </div>
                                <p class="card-text mt-3" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">{{ $product->deskripsi }}</p>
                                <a href="#" class="btn btn-primary w-100">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
