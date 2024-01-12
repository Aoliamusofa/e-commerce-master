<?php

namespace App\Http\Controllers;

use App\Models\Expedisi;
use App\Models\Payment;
use App\Models\Produk;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function HomeClient()
    {
        $data = Produk::all();
        return view('client.home', ['title' => 'produk', 'data' => $data]);
    }
    public function DetailSebelumCekout($id)
    {
        $payment = Payment::select('id_pembayaran', 'metode_pembayaran')->get();
        $ekspedisi = Expedisi::select('id_expedisi', 'nama_expedisi')->get();
        // dd($ekspedisi);
        $data = Produk::where('id_produk', $id)->get();
        return view('client.details', [
            'title' => 'detail baju',
            'data' => $data,
            'expedisi' => $ekspedisi,
            'payment' => $payment
        ]);
    }
}
