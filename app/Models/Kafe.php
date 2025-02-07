<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kafe extends Model
{
    use HasUuids, SoftDeletes;

    protected $table="kafe";
    protected $primaryKey = "id";
    protected $guarded = "id";
    
}
