<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QutationItem extends Model
{
    use HasFactory, softDeletes;
    protected $table = "qutation_items";
    protected $guarded = ["id"];

    function qutation()
    {
        return $this->belongsTo(Qutation::class, 'qutation_id');
    }

    function workorder()
    {
        return $this->belongsTo(Workorder::class, 'workorder_id');
    }
}
