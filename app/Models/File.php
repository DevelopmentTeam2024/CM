<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, softDeletes;
    protected $guarded = ["id"];

    function fileable()
    {
        return $this->morphTo();
    }
}
