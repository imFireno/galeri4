<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $profile = request()->file('profile');
        $data = [
            'username' => request('username'),
            'nama_lengkap' => request('nama_lengkap'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'profile' => $profile->store(auth()->id()),
        ];

        User::create($data);

        session()->flash('berhasil', 'Register Berhasil');
        return redirect('/login');
    }

    public function login()
    {
        $data = [
            'email' => request('email'),
            'password' => request('password'),
        ];

        if(Auth::attempt($data)){
            return redirect('/');
        }else{
            return redirect('/login')->with('gagal', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda Berhasil Logout');
    }
}
