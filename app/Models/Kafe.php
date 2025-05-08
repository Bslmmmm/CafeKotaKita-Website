<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kafe extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table="kafe";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'alamat', 'telp', 'latitude', 'longitude', 'status'];

    public function Menu() {
        return $this->hasMany(Menu::class);
    }
    public function Gallery() {
        return $this->hasMany(Gallery::class);
    }
    public function Genre()
    {
        return $this->belongsToMany(Genre::class, "genre_kafe");
    }

    public function Komentar() {
        return $this->hasMany(Komentar::class);
    }

    public function Reservasi() {
        return $this->hasMany(Reservasi::class);
    }
}
