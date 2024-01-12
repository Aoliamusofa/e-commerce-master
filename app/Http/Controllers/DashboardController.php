<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function DataDashboard()
    {
        $data = Produk::all()->count();
        $terjual = Pesanan::where('status_pesanan', '=', 'lunas')->count();
        $pesanan_masuk = Pesanan::where('status_pesanan', '=', 'pending')->count();
        // dd($Terjual);
        // dd($data);
        return view('dashboard', [
            'title' => 'dashboard',
            'data' => $data,
            'terjual' => $terjual,
            'masuk' => $pesanan_masuk,
        ]);
    }
}
