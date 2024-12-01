<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, softDeletes;
    protected $guarded = ["id"];

    function project(){
        return $this->belongsTo(Project::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function statuses()
    {
        return $this->hasMany(Status::class);
    }
    function status()
    {
        return $this->hasOne(Status::class)->latestOfMany();
    }
    function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    function qutations()
    {
        return $this->hasMany(Qutation::class);
    }

    function customer(){
        return $this->belongsTo(Customer::class);
    }
}
