<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        // Validasi input
        $messages = [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'email.exists' => 'Email atau Password Salah',
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], $messages);

        // Ambil kredensial login
        $credentials = $request->only('email', 'password');

        // Coba otentikasi
        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Email atau Password Salah']);
        }
    }


    public function register()
    {
        return view('auth.register');
    }

    public function register_process(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create($data);

        return redirect()->route('dashboard')->with('sucess', 'Berhasil Membuat Akun');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
