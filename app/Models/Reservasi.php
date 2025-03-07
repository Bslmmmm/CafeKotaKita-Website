<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservasi extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="reservasi";
    protected $primaryKey = "id";
    protected $guarded = "id";
    
    public function kafe() {
        return $this->belongsTo(Kafe::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
