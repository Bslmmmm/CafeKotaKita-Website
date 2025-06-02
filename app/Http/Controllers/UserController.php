<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $data = User::all();
        return view('admin.user.index', compact('data'));
    }
    public function owner(Request $req)
    {
        $data = Owner::with(["kafe", "user"])->get();
        return view('admin.user.owner', compact('data'));
    }
    public function validasiOwner($id)
    {
        $owner = Owner::findOrFail($id);

        $status = "aktif";

        $data = [
            "status" => $status,
        ];
        $owner->update($data);
        return redirect()->route('user.owner');
    }
    public function tolakValidasi($id)
    {
        $owner = Owner::findOrFail($id);

        $status = "ditolak";

        $data = [
            "status" => $status,
        ];
        $owner->update($data);
        return redirect()->route('user.owner');
    }
}
