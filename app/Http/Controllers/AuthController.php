<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if(Auth::check())
            {

                $req->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
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
}