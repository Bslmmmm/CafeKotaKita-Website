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
    protected $guarded = "id";
    
    public function Kategori() {
        return $this->belongsTo(Kategori::class, "menu_kategori");
    }
}
