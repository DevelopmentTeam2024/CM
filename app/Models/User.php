<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enum\DepartmentEnum;
use App\Enum\RoleEnum;
use App\Enum\BranchEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ["id"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'branch' => BranchEnum::class,
            'department' => DepartmentEnum::class,
            'role' => RoleEnum::class,
        ];
    }

    function orders()
    {
        return $this->hasMany(Order::class);
    }
    function statuses()
    {
        return $this->hasMany(Status::class);
    }
    function files()
    {
        return $this->hasMany(File::class);
    }
}