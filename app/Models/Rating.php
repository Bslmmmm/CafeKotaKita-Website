<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="rating";
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'kafe_id', 'rate'];
    
    public function Kafe() {
        return $this->belongsTo(Kafe::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
