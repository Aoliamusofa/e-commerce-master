<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{

    public function GetAllPesanan()
    {
        $data = Pesanan::joinToProduk()->joinToUser()->joinToExpedisi()->joinToPembayaran()->orderBy('id_pesanan', 'DESC')->get();
        return view('pesanan', [
            'title' => 'pesanan',
            'data' => $data
        ]);
    }
    public function AddPesanan(Request $request)
    {
        $data_roles = [
            "data_detail.id_produk" => "required",
            "data_detail.user_id" => "required",
            "data_detail.size_order" => "required",
            "data_detail.jumlah_pesanan" => "required",
            "data_detail.total_produk" => "required",
            "data_modal.id_expedisi" => "required",
            "data_modal.id_pembayaran" => "required",
            "data_modal.tinggalkan_pesan" => "required",
        ];
        Validator::make($request->all(), $data_roles);
        try {
            $data = new Pesanan();
            $data->id_produk = $request->data_detail['id_produk'];
            $data->user_id = $request->data_detail['user_id'];
            $data->size_order = $request->data_detail['size_order'];
            $data->jumlah_pesanan = $request->data_detail['jumlah_pesanan'];
            $data->total_produk = $request->data_detail['total_produk'];
            $data->tanggal_pesanan = date('Y-m-d');
            $data->id_expedisi = $request->data_modal['id_expedisi'];
            $data->id_pembayaran = $request->data_modal['id_pembayaran'];
            $data->tinggalkan_pesan = $request->data_modal['tinggalkan_pesan'];
            $data->save();
            return redirect('/pesanansaya')->with('success', 'akun berhasil di tambahkan');
        } catch (\Throwable $th) {
            return redirect('/details')->with('errors', 'akun gagal di tambahkan');
        }
    }
    public function UpdatePesanan(Request $request)
    {
        Validator::make($request->all(), [
            'status_pembayaran' => 'required',
            'status_pesanan' => 'required',
        ]);
        try {
            $data = array(
                'status_pembayaran' => $request->status_pembayaran,
                'status_pesanan' => $request->status_pesanan,

            );
            Pesanan::where('id_pesanan', '=', $request->id_pesanan)->update($data);
            return redirect('/pesanan')->with('success', 'pesanan berhasil diverifikasi');
        } catch (\Throwable $th) {
            return redirect('/pesanan')->with('errors', 'pesanan gagal di verifikasi');
        }
    }
    public function DeletePesanan($id)
    {
        try {
            Pesanan::where('id_pesanan', '=', $id)->delete();
            return redirect('/pesanan')->with('success', 'pesanan berhasil hapus');
        } catch (\Throwable $th) {
            return redirect('/pesanan')->with('errors', 'pesanan gagal di hapus');
        }
    }
}
