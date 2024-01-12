<?php

namespace App\Http\Controllers;

use App\Models\Expedisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpedisiController extends Controller
{
    public function GetAllExpedisi()
    {
        $data = Expedisi::all();
        return view('expedisi', [
            'title' => 'expedisi',
            'data' => $data
        ]);
    }
    public function AddExpedisi(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "nama_expedisi" => "required",
                "biaya_expedisi" => "required",
                "jenis_expedisi" => "required"
            ]
        );
        try {
            $data = new Expedisi([
                "nama_expedisi" => $request->nama_expedisi,
                "biaya_expedisi" => $request->biaya_expedisi,
                "jenis_expedisi" => $request->jenis_expedisi
            ]);
            $data->save();
            return redirect('/expedisi')->with('success', 'data berhasil di simpan');
        } catch (\Throwable $th) {
            return redirect('/expedisi')->with('errors', 'data gagal di simpan');
        }
    }
    public function UpdateExpedisi(Request $request)
    {
        // dd($request);
        Validator::make(
            $request->all(),
            [
                "nama_expedisi" => "required",
                "biaya_expedisi" => "required",
                "jenis_expedisi" => "required"
            ]
        );
        try {
            $data = array(
                "nama_expedisi" => $request->nama_expedisi,
                "biaya_expedisi" => $request->biaya_expedisi,
                "jenis_expedisi" => $request->jenis_expedisi
            );
            Expedisi::where('id_expedisi', $request->id_expedisi)->update($data);
            return redirect('/expedisi')->with('success', 'data berhasil di edit');
        } catch (\Throwable $th) {
            return redirect('/expedisi')->with('errors', 'data gagal di hapus');
        }
    }
    public function DeleteExpedisi($id)
    {
        try {
            Expedisi::where('id_expedisi', $id)->delete();
            return redirect('/expedisi')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/expedisi')->with('errors', 'data gagal di hapus');
        }
    }
}
