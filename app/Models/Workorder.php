<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workorder extends Model
{
    use HasFactory, softDeletes;
    protected $guarded = ["id"];
    protected $table = 'workorders';

    function qutation()
    {
        return $this->belongsTo(Qutation::class);
    }

    function parent()
    {
        return $this->belongsTo(Workorder::class, 'workorder_id');
    }

    function childs()
    {
        return $this->hasMany(Workorder::class, 'workorder_id');
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function items()
    {
        return $this->hasMany(QutationItem::class, 'workorder_id');
    }
}
