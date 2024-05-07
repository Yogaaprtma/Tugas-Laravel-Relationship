<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Profile</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-6 text-center mb-5">
                <a href="{{ route('merchant.list-products', ['id'=>16]) }}" class="btn btn-success">Kembali ke Halaman Merchant</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card border-dark border-3 mb-3 h-100">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3"><strong>Nama Akun</strong></div>
                                <div class="col-6">{{ $user->name_akun }}</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3"><strong>Email</strong></div>
                                <div class="col-6">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3"><strong>Gender</strong></div>
                                <div class="col-6">{{ $user->gender }}</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3"><strong>Umur</strong></div>
                                <div class="col-6">{{ $user->umur }}</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3"><strong>Tanggal Lahir</strong></div>
                                <div class="col-6">{{ $user->tanggal_lahir }}</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3"><strong>Alamat</strong></div>
                                <div class="col-9">{{ $user->alamat }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-dark border-3 mb-3 h-100">
                    <div class="card-body">
                        @if($detailUser)
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3"><strong>Nama Toko</strong></div>
                                    <div class="col-6">{{ $detailUser->nama_toko }}</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3"><strong>Rate</strong></div>
                                    <div class="col-6">{{ $detailUser->rate }}</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3"><strong>Produk Terbaik</strong></div>
                                    <div class="col-6">{{ $detailUser->produk_terbaik }}</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3"><strong>Deskripsi</strong></div>
                                    <div class="col-9">{{ $detailUser->deskripsi }}</div>
                                </div>
                            </div>
                        @else
                            <p>Anda belum memiliki detail toko. <a href="{{ route('merchant.create') }}">Tambahkan sekarang</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>    
    </div>
</body>
</html>
