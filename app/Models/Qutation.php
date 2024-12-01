<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qutation extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    function order()
    {
        return $this->belongsTo(Order::class);
    }

    function workorders()
    {
        return $this->hasMany(Workorder::class, 'qutation_id');
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function items()
    {
        return $this->hasMany(QutationItem::class, 'qutation_id');
    }

    function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}