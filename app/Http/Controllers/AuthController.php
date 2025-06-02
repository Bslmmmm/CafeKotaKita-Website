<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $req)
{
    $credentials = $req->only("email", "password");

    if (Auth::attempt($credentials)) {
        $req->session()->regenerate();
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('welcome');
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        return redirect()->route('login');
    }

    public function showRegisterForm()
    {
        return view('admin.register'); // Sesuaikan nama file view register kamu
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $data['nama'] = $data ['name'];
        unset($data['name']);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
