<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function LoginView()
    {
        return view('auth.login', ['title' => 'login']);
    }
    public function LoginAuth(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/dashboard')->withSuccess('anda berhasil login');
            } elseif (Auth::user()->role == 'pelanggan') {
                return redirect()->intended('/home')->withSuccess('anda berhasil login');
            } else {
                print_r("anda tidak memiliki hak akses");
            }
        } elseif (!Auth::attempt($data)) {
            return redirect('/login')->withErrors(['errors' => 'email atau password salah']);
        }
    }


    public function RegisterView()
    {
        return view('auth.register', ['title' => 'register']);
    }
    public function RegisterPost(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'jk' => 'required',
            'tlp' => 'required',
            'alamat' => 'required'
        ]);
        try {
            $data = new User([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'jk' => $request->jk,
                'tlp' => $request->tlp,
                'alamat' => $request->alamat
            ]);
            $data->save();
            return redirect('/login')->with('success', 'register berhasil');
        } catch (\Throwable $th) {
            return redirect('/register')->with('errors', 'akun gagal di tambahkan');
        }
    }

    public function Logout()
    {

        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
