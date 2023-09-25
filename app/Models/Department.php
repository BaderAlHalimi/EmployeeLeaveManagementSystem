<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'short_name',
        'name',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
