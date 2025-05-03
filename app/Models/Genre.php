<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="genre";
    protected $primaryKey = "id";
    protected $fillable = ["nama"];

    public function Kafe() {
        return $this->belongsTo(Kafe::class);
    }
}
