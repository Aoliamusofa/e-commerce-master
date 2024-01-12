<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function GetProduk()
    {
        $data = Produk::select('id_produk', 'nama_produk', 'foto_produk', 'harga_barang')->get();
        return view('produkhome', ['title' => 't-shirt product', 'data' => $data]);
    }
    public function DetailProduk($id)
    {
        $databyid = Produk::where('id_produk', $id)->get();
        return view('detailproduk', ['title' => 't-shirt details', 'databyid' => $databyid]);
    }
}
