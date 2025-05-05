<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="gallery";
    protected $primaryKey = "id";
    protected $fillable = [
        'kafe_id',
        'image',
    ];

    public function Kafe() {
        return $this->belongsTo(Kafe::class);
    }
}
