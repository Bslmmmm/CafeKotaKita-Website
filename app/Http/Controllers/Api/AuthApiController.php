<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kafe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);


        $data['password'] = bcrypt($data['password']);

        // Create the user in the database
        User::create($data);

        return response()->json([
            'message' => 'User registered successfully',
        ], 201);
    }
    function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'message' => 'User tidak ditemukan'
        ], 404);
    }

    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Password tidak cocok'
        ], 401);
    }

    // Jika tidak ingin menggunakan token, cukup return data user saja
    return response()->json([
        'message' => 'Login berhasil',
        'user' => [
            'id' => $user->id,
            'nama' => $user->nama,
            'email' => $user->email,
            'role' => $user->role
        ]
    ], 200);
}

public function forgotpassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email'
    ]);

    $otp = rand(100000, 999999); // 6 digit
    $email = $request->email;

    // Simpan OTP di database (misal di tabel `password_resets`)
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $email],
        ['token' => $otp, 'created_at' => now()]
    );

    // Kirim email
    Mail::raw("Kode OTP Anda adalah: $otp", function ($message) use ($email) {
        $message->to($email)
                ->subject('Kode OTP Reset Password');
    });

    return response()->json(['message' => 'Kode OTP berhasil dikirim ke email']);
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'otp' => 'required|digits:6'
    ]);

    $record = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->first();

    if (!$record || $record->token !== $request->otp) {
        return response()->json(['message' => 'OTP tidak cocok atau tidak ditemukan'], 400);
    }

    // Validasi waktu kadaluarsa (misal 15 menit)
    if (now()->diffInSeconds($record->created_at) > 60) {
    return response()->json(['message' => 'OTP sudah kadaluarsa'], 400);
}


    return response()->json(['message' => 'OTP valid']);
}

public function resetpassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'otp' => 'required',
        'password' => 'required|min:6|confirmed',
    ]);

    // Cek OTP dari tabel password_reset_tokens
    $tokenData = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->otp)
        ->first();

    if (!$tokenData) {
        return response()->json(['message' => 'OTP tidak cocok'], 400);
    }

    // Optional: Periksa apakah OTP sudah kedaluwarsa
    if (now()->diffInMinutes($tokenData->created_at) > 1) {
        return response()->json(['message' => 'OTP sudah kadaluarsa'], 400);
    }

    // Update password
    User::where('email', $request->email)->update([
        'password' => Hash::make($request->password),
    ]);

    // Hapus OTP dari database
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return response()->json(['message' => 'Password berhasil direset']);
}

    function promoteOwner(Request $req)
    {
        $data = $req->validate([
            'user_id' => 'required',
            'npwp' => 'required',
            'foto_surat_kepemilikan' => '',
            'foto_surat_ijin_usaha' => '',

        ]);
    }
}
