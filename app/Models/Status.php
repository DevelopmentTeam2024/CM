<?php

namespace App\Models;

use App\Enum\StatusEnum;
use App\Enum\PriorityEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory, softDeletes;
    protected $guarded = ["id"];

    protected function casts(): array
    {
        return [
            'status' => StatusEnum::class,
            'priority' => PriorityEnum::class,
            'expected_date' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    function order()
    {
        return $this->belongsTo(Order::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function checker()
    {
        return $this->belongsTo(User::class, 'checker_id');
    }
    function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
