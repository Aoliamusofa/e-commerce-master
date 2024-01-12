<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function GetAllUser()
    {
        $data = User::all();
        return view('user', [
            'title' => 'akun',
            'data' => $data
        ]);
    }
    public function AddUser(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'role' => 'required'
            ]
        );
        try {
            $data = new User([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            $data->save();
            return redirect('/users')->with('success', 'akun berhasil di tambahkan');
        } catch (\Throwable $th) {
            return redirect('/users')->with('errors', 'akun gagal di tambahkan');
        }
    }
    public function UpdateUser(Request $request)
    {
    }
    public function DeleteUser($id)
    {
        try {
            User::where("user_id", $id)->delete();
            return redirect('/users')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/users')->with('errors', 'data gagal di hapus');
        }
    }
}
