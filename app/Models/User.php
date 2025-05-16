<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasUuids, SoftDeletes;
// Tambahkan ini di Model User
    protected $table="users";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_telp',
        'password',
        'role',
    ];

    public function Reservasi() {
        return $this->hasMany(Reservasi::class);
    }
}


