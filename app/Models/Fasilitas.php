<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fasilitas extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="fasilitas";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'deskripsi', 'image'];

    public function Kafe() {
        return $this->belongsToMany(Kafe::class, "fasilitas_kafe", "facility_id", "kafe_id");
    }
}
