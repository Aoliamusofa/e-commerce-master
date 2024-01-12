<?php

namespace App\Http\Controllers;

use App\Models\KatProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function GetAllProduk()
    {
        $data_kategori = KatProduk::select('id_kat_produk', 'nama_katproduk')->get();
        $data = Produk::with('JoinToKategoriProduk')->get();
        $sizing = ["S", "M", "L", "XL", "XXL", "XXXL"];
        return view('produk', [
            'title' => 'produk',
            'data' => $data,
            'kategori' => $data_kategori,
            'sizing' => $sizing,
        ]);
    }
    public function AddProduk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kat_produk' => 'required',
            'nama_produk' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'bahan' => 'required',
            'deskripsi' => 'required',
            'warna' => 'required',
            'size' => 'required',
            'foto_produk' => 'required|image|mimes:png,svg|max:2048'
        ]);
        // dd($validator);
        try {
            if (!$validator->fails()) {
                $getFile = $request->file('foto_produk');
                $getFileName = $getFile->hashName();
                $direktory = "/foto_produk/$getFileName";
                $request->foto_produk->move(public_path('/foto_produk/'), $getFileName);
            } elseif ($validator->fails()) {
                return redirect('/produk')->with('message', 'gagal di tambahkan');
            }
            $data = new Produk([
                'id_kat_produk' => $request->id_kat_produk,
                'nama_produk' => $request->nama_produk,
                'harga_barang' => $request->harga_barang,
                'stok_barang' => $request->stok_barang,
                'bahan' => $request->bahan,
                'deskripsi' => $request->deskripsi,
                'warna' => $request->warna,
                'size' => implode(',', $request->size),
                'foto_produk' => $direktory
            ]);
            // dd($data);
            $data->save();
            return redirect('/produk')->with('success', 'data berhasil disimpan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/produk')->with('message', 'gagal di tambahkan');
        }
    }
    public function UpdateProduk(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'id_kat_produk' => 'required',
            'nama_produk' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'bahan' => 'required',
            'deskripsi' => 'required',
            'warna' => 'required',
            'size' => 'required',
            'foto_produk' => 'required|image|mimes:png,svg|max:2048'

        ]);
        // dd($validator);
        try {
            if (!$validator->fails()) {
                $getFile = $request->file('foto_produk');
                $getFileName = $getFile->hashName();
                $direktory = "/foto_produk/$getFileName";
                $request->foto_produk->move(public_path('/foto_produk/'), $getFileName);
            } elseif ($validator->fails()) {
                return redirect('/produk')->with('message', 'gagal di tambahkan');
            }
            $data = array(
                'id_kat_produk' => $request->id_kat_produk,
                'nama_produk' => $request->nama_produk,
                'harga_barang' => $request->harga_barang,
                'stok_barang' => $request->stok_barang,
                'bahan' => $request->bahan,
                'deskripsi' => $request->deskripsi,
                'warna' => $request->warna,
                'size' => implode(',', $request->size),
                'foto_produk' => $direktory
            );
            // dd($data);
            Produk::where('id_produk', $request->id_produk)->update($data);
            return redirect('/produk')->with('success', 'data berhasil edit');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/produk')->with('message', 'gagal di edit');
        }
    }
    public function DeleteProduk($id)
    {
        try {
            Produk::where('id_produk', $id)->delete();
            return redirect('/produk')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/produk')->with('errors', 'data gagal di hapus');
        }
    }
}
