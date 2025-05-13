<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Owner;
use App\Models\Kafe;
use App\Models\Genre;
use App\Models\Kategori;

class AdminController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $totalUser = User::count();
        $totalOwner = Owner::count();
        $totalKafe = Kafe::count();
        $totalGenre = Genre::count();
        $totalKategori = Kategori::count();

        return view('admin.dashboard', compact('user', 'totalUser', 'totalOwner', 'totalKafe', 'totalGenre', 'totalKategori'));
    }
}
