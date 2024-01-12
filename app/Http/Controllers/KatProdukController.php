<?php

namespace App\Http\Controllers;

use App\Models\KatProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KatProdukController extends Controller
{
    public function GetAllKategori()
    {
        $data = KatProduk::all();
        return view('kategori_produk', [
            'title' => 'kategori produk',
            'data' => $data
        ]);
    }
    public function AddKategori(Request $request)
    {
        // dd($request);
        Validator::make(
            $request->all(),
            [
                'nama_katproduk' => 'required'
            ]
        );
        try {
            $data = new KatProduk([
                'nama_katproduk' => $request->nama_katproduk
            ]);
            $data->save();
            return redirect('/kategori')->with('success', 'data berhasil di simpan');
        } catch (\Throwable $th) {
            return redirect('/kategori')->with('errors', 'data gagal di simpan');
        }
    }
    public function UpdateKategori(Request $request)
    {
        // dd($request);
        Validator::make(
            $request->all(),
            [
                'nama_katproduk' => 'required'
            ]
        );
        try {
            $data = array(
                'nama_katproduk' => $request->nama_katproduk
            );
            KatProduk::where('id_kat_produk', $request->id_kat_produk)->update($data);
            return redirect('/kategori')->with('success', 'data berhasil di edit');
        } catch (\Throwable $th) {
            return redirect('/kategori')->with('errors', 'data gagal di hapus');
        }
    }
    public function DeleteKategori($id)
    {
        try {
            KatProduk::where('id_kat_produk', $id)->delete();
            return redirect('/kategori')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/kategori')->with('errors', 'data gagal di hapus');
        }
    }
}
