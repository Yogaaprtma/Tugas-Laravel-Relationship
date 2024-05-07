<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Form Edit Product</title>
</head>
<body>
    <div class="container" style="width: 500px">
        @if (Session::has('error'))
            <p class="row bg-danger text-white mt-3 fw-bold ps-3 pt-2 pb-2 rounded">{{Session::get('error')}}</p>
        @endif
    </div>
    <div class="container bg-info mt-4 rounded" style="width: 500px">
        <form action="{{ route('merchant.update', ['userId' => $userId, 'product' => $product->id]) }}" method="POST">
            @method('PUT')
            @csrf()
            <h4 class="fw-semibold text-center pt-4">Edit Data Produk {{$product->id}}</h4>
            <div class="fw-semibold pt-1">
                <label for="gambar_produk">Gambar Produk</label>
                <input class="form-control border-0 w-100 rounded mt-2" type="text" name="gambar" id="gambar_produk" placeholder="Masukkan gambar produk" value="{{ $product->gambar }}" required>
            </div>
            <div class="fw-semibold pt-3">
                <label for="nama_produk">Nama produk</label><br>
                <input class="form-control border-0 w-100 rounded mt-2" type="text" name="namaProduk" id="nama_produk" placeholder="Masukkan nama produk" value="{{ $product->namaProduk }}" required>
            </div>
            <div class="fw-semibold pt-3">
                <label for="Berat">Berat</label><br>
                <input class="form-control border-0 w-100 rounded mt-2" type="number" name="berat" id="Berat" placeholder="Masukkan berat produk" value="{{ $product->berat }}" required>
            </div>
            <div class="fw-semibold pt-3">
                <label for="Harga">Harga</label><br>
                <input class="form-control border-0 w-100 rounded mt-2" type="number" name="harga" id="Harga" placeholder="Masukkan harga produk" value="{{ $product->harga }}" required>
            </div>
            <div class="fw-semibold pt-3">
                <label for="Stok">Stok</label><br>
                <input class="form-control border-0 w-100 rounded mt-2" type="number" name="stok" id="Stok" placeholder="Masukkan stok produk" value="{{ $product->stok }}" required>
            </div>
            <div class="fw-semibold pt-3">
                <label for="Kondisi">Kondisi</label><br>
                <select class="form-control border-0 w-100 rounded mt-2" name="kondisi" id="Kondisi" required>
                    <option selected>Pilih Kondisi Barang</option>
                    <option value="Bekas" {{ $product->kondisi == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                    <option value="Baru" {{ $product->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                </select>
            </div>
            <div class="fw-semibold pt-3">
                <label for="Deskripsi">Deskripsi</label><br>
                <textarea class="form-control border-0 w-100 rounded mt-2" name="deskripsi" id="Deskripsi" placeholder="Tuliskan deskripsi produk yang akan dijual" cols="30" rows="4" required>{{ $product->deskripsi }}</textarea>
            </div>
            <div class="col-md-6 offset-md-3 text-center">
                <button class="btn btn-dark text-white text-center mt-3 mb-3" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>