<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="kategori";
    protected $primaryKey = "id";
    protected $guarded = "id";
    
    public function menu() {
        return $this->hasMany(Menu::class, 'menu_kategori');
    }
}
