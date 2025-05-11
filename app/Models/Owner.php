<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Owner extends Model
{
    use HasUuids, SoftDeletes;

    protected $table = "owner";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'kafe_id',
        'npwp',
        'foto_surat_kepemilikan',
        'foto_surat_ijin_usaha',
        'instagram_link',
        'tiktok_link',
        'facebook_link',
        'status',
        'keterangan_tambahan'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    
    public function Kafe()
    {
        return $this->belongsTo(Kafe::class);
    }
}
