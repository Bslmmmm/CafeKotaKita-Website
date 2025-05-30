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
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
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
        'login' => 'required|array', // validasi bahwa login adalah array/object
        'password' => 'required|string',
    ]);

    $loginData = $request->input('login');

    if (isset($loginData['email'])) {
        $loginValue = $loginData['email'];
        $loginField = 'email';
    } elseif (isset($loginData['nama'])) {
        $loginValue = $loginData['nama'];
        $loginField = 'nama';
    } else {
        return response()->json([
            'message' => 'Email atau nama harus diisi'
        ], 400);
    }

    $user = User::where($loginField, $loginValue)->first();

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



    return response()->json([
        'message' => 'Login berhasil',
        'user' => [
            'id' => $user->id,
            'nama' => $user->nama,
            'email' => $user->email,
            'no_telp' => $user->no_telp,
            'foto_profil_url' => $user->foto_profil
                ? asset('storage/profiles/' . $user->foto_profil)
                : null,
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


    public function checkusername(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'available' => false,
                'message' => 'Username tidak valid'
            ], 400);
        }

        $exists = User::where('nama', $request->nama)->exists();

        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'Username sudah digunakan' : 'Username tersedia'
        ]);
    }

    /**
     * Check email availability
     */
    public function checkemail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'available' => false,
                'message' => 'Email tidak valid'
            ], 400);
        }

        $exists = User::where('email', $request->email)->exists();

        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'Email sudah terdaftar' : 'Email tersedia'
        ]);
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
