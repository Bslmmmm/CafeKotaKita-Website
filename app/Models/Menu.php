<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table="menu";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'harga', 'status'];

    public function Kategori() {
        return $this->belongsTo(Kategori::class, "menu_kategori");
    }
    public function Kafe() {
        return $this->belongsTo(Kafe::class, "kafe_id");
    }
}
