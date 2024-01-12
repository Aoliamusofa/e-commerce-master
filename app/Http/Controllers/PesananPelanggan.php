<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PesananPelanggan extends Controller
{
    public function GetPesananSaya()
    {
        $dataPesananPelanggan = Pesanan::joinToProduk()->joinToUser()->joinToExpedisi()->joinToPembayaran()->get();
        return view('client.pesanan_saya', [
            'title' => 'pesanan saya',
            'data' => $dataPesananPelanggan
        ]);
    }
    public function UploadBuktiPembayaran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status_pembayaran' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:png,svg|max:2048'
        ]);
        // dd($validator);
        try {
            if (!$validator->fails()) {
                $getFile = $request->file('bukti_pembayaran');
                $getFileName = $getFile->hashName();
                $direktory = "/bukti_pembayaran/$getFileName";
                $request->bukti_pembayaran->move(public_path('/bukti_pembayaran/'), $getFileName);
            } elseif ($validator->fails()) {
                // dd($validator->fails());
                return redirect('/pesanansaya')->with('message', 'foto bukti pembayaran  tidak boleh kosong');
            }
            $data = array(
                'status_pembayaran' => $request->status_pembayaran,
                'bukti_pembayaran' => $direktory
            );
            Pesanan::where('id_pesanan', '=', $request->id_pesanan)->update($data);
            return redirect('/pesanansaya')->with('success', 'upload bukti pembayaran  berhasil');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/pesanansaya')->with('errors', 'upload bukti pembayaran  gagal');
        }
    }
}
