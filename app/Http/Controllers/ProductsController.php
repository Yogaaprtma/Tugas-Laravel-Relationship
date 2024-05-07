<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function list_products($id)
    {
        $userId = $id; 
        $products = Product::where('user_id', $id)->get(); 
        return view('admin.admin', ['products' => $products, 'userId' => $userId]);
    }

    public function merchant_list($id)
    {
        $userId = $id; 
        $products = Product::where('user_id', $id)->get(); 
        return view('merchant.merchant_list', ['products' => $products, 'userId' => $userId]);
    }

    public function PageCreate()
    {
        return view('admin.tambah_product');
    }

    public function MerchantCreate()
    {
        return view('merchant.tambah_product');
    }

    public function create(Request $req, $id)
    {
        $user = User::firstOrCreate([
            'email' => 'admin.amandemy@gmail.com'
        ], [
            'name_akun' => 'Admin Amandemy',
            'gender' => 'male',
            'umur' => 23,
            'tanggal_lahir' => '1986-05-20',
            'alamat' => 'Jalan Nusa Indah No 3 Trangkil, Pati Jawa Tengah'
        ]);

        $gambar = $req->gambar;
        $namaProduk = $req->namaProduk;
        $berat = $req->berat;
        $harga = $req->harga;
        $stok = $req->stok;
        $kondisi = $req->kondisi;
        $deskripsi = $req->deskripsi;

        if (!$gambar) {
            return redirect()->back()->with('error', 'Error. Field Gambar Produk Wajib diisi.');
        } else if (!$namaProduk) {
            return redirect()->back()->with('error', 'Error. Field Nama Produk Wajib diisi.');
        } else if (!$berat) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$harga) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$stok) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($kondisi == "Pilih Kondisi Barang") {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$deskripsi) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }

        Product::create([
            'gambar' => $req->gambar,
            'namaProduk' => $req->namaProduk,
            'berat' => $req->berat,
            'harga' => $req->harga,
            'stok' => $req->stok,
            'kondisi' => $req->kondisi,
            'deskripsi' => $req->deskripsi,
            'user_id' => $id, 
        ]);

        return redirect()->route('admin.list-products', ['id' => $id]);
    }

    public function createMerchant(Request $req, $id)
    {
        $user = User::firstOrCreate([
            'email' => 'admin.amandemy@gmail.com'
        ], [
            'name_akun' => 'Admin Amandemy',
            'gender' => 'male',
            'umur' => 23,
            'tanggal_lahir' => '1986-05-20',
            'alamat' => 'Jalan Nusa Indah No 3 Trangkil, Pati Jawa Tengah'
        ]);

        $gambar = $req->gambar;
        $namaProduk = $req->namaProduk;
        $berat = $req->berat;
        $harga = $req->harga;
        $stok = $req->stok;
        $kondisi = $req->kondisi;
        $deskripsi = $req->deskripsi;

        if (!$gambar) {
            return redirect()->back()->with('error', 'Error. Field Gambar Produk Wajib diisi.');
        } else if (!$namaProduk) {
            return redirect()->back()->with('error', 'Error. Field Nama Produk Wajib diisi.');
        } else if (!$berat) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$harga) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$stok) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($kondisi == "Pilih Kondisi Barang") {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$deskripsi) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }

        Product::create([
            'gambar' => $req->gambar,
            'namaProduk' => $req->namaProduk,
            'berat' => $req->berat,
            'harga' => $req->harga,
            'stok' => $req->stok,
            'kondisi' => $req->kondisi,
            'deskripsi' => $req->deskripsi,
            'user_id' => $id,
        ]);

        return redirect()->route('admin.list-products', ['id' => $id]);
    }

    public function pageUpdate($userId, $idProduct)
    {
        $product = Product::find($idProduct);

        return view('admin.form_update', ['product' => $product, 'userId' => $userId]);
    }

    public function HalamanUpdate($userId, $idProduct)
    {
        $product = Product::find($idProduct);

        return view('merchant.merchant_update', ['product' => $product, 'userId' => $userId]);
    }

    public function update(Request $req, $userId, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->gambar = $req->gambar;
        $product->namaProduk = $req->namaProduk;
        $product->berat = $req->berat;
        $product->harga = $req->harga;
        $product->stok = $req->stok;
        $product->kondisi = $req->kondisi;
        $product->deskripsi = $req->deskripsi;

        $product->save();
        
        return redirect()->route('admin.list-products', ['id' => $userId])->with('success', 'Produk berhasil diperbarui');
    }

    public function updateMerchant(Request $req, $userId, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->gambar = $req->gambar;
        $product->namaProduk = $req->namaProduk;
        $product->berat = $req->berat;
        $product->harga = $req->harga;
        $product->stok = $req->stok;
        $product->kondisi = $req->kondisi;
        $product->deskripsi = $req->deskripsi;

        $product->save();

        return redirect()->route('merchant.list-products', ['id' => $userId])->with('success', 'Produk berhasil diperbarui');
    }

    public function delete($userId, $productId)
    {
        Product::destroy($productId);

        return redirect()->back();
    }

    public function hapus($userId, $productId)
    {
        Product::destroy($productId);

        return redirect()->back();
    }

    public function profile($id)
    {
        $user = User::where('id', $id)->first();

        $detailUser = DetailUser::where('user_id', $user->id)->first();

        return view('admin.profile', ['user' => $user, 'detailUser' => $detailUser]);
    }

    public function profileMerchant($id)
    {
        $user = User::where('id', $id)->first();

        $detailUser = DetailUser::where('user_id', $user->id)->first();

        return view('merchant.Merchant_profile', ['user' => $user, 'detailUser' => $detailUser]);
    }

}