<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type' => 'employee',
        'gender',
        'age',
        'mobile',
        'admin',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function employees()
    {
        return $this->hasMany(User::class, 'admin', 'id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'admin', 'id');
    }
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'user_id', 'id');
    }
    public function empLeaves()
    {
        return $this->belongsToMany(
            Leave::class,
            'user_leaves',
            'user_id',
            'leaves_id',
            'id',
            'id'
        )->withPivot(['created_at','status','number_days','reason']);
    }
}
