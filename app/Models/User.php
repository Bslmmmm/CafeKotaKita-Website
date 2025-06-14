<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
implements JWTSubject
{
    use HasUuids, SoftDeletes;
    // Tambahkan ini di Model User
    protected $table = "users";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_telp',
        'password',
        'role',
        'foto_profil',
    ];

    public function getJWTIdentifier()
    {
        $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
    public function Rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function Bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }
}
