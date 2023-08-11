<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLeave extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'leaves_id',
        'number_days',
        'status',
        'reason',
    ];
}
