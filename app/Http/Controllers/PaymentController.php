<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    public function GetAllPayment()
    {
        $data = Payment::all();
        return view('payment', [
            'title' => 'payment',
            'data' => $data
        ]);
    }
    public function AddPayment(Request $request)
    {
        // dd($request);
        Validator::make(
            $request->all(),
            [
                'metode_pembayaran' => 'required',
                'nomor_rekening' => 'required'
            ]
        );
        try {
            $data = new Payment([
                'metode_pembayaran' => $request->metode_pembayaran,
                'nomor_rekening' => $request->nomor_rekening
            ]);
            $data->save();
            return redirect('/payment')->with('success', 'data berhasil di simpan');
        } catch (\Throwable $th) {
            return redirect('/payment')->with('errors', 'data gagal di simpan');
        }
    }
    public function UpdatePayment(Request $request)
    {
        // dd($request);
        Validator::make(
            $request->all(),
            [
                'metode_pembayaran' => 'required',
                'nomor_rekening' => 'required'
            ]
        );
        try {
            $data = array(
                'metode_pembayaran' => $request->metode_pembayaran,
                'nomor_rekening' => $request->nomor_rekening
            );
            Payment::where("id_pembayaran", $request->id_pembayaran)->update($data);
            return redirect('/payment')->with('success', 'data berhasil di edit');
        } catch (\Throwable $th) {
            return redirect('/payment')->with('errors', 'data gagal di edit');
        }
    }
    public function DeletePayment($id)
    {
        try {
            Payment::where("id_pembayaran", $id)->delete();
            return redirect('/payment')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/payment')->with('errors', 'data gagal di hapus');
        }
    }
}
