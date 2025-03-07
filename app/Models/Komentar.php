<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komentar extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="komentar";
    protected $primaryKey = "id";
    protected $guarded = "id";
    
    public function Kafe() {
        return $this->belongsTo(Kafe::class);
    }
}
