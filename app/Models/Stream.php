<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory,HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        // 'id',
        'user_id',
        'content',
        'link',
    ];

    public function getUpdatedAtColumn()
    {
    }

    public function setUpdatedAt($value)
    {
        return $this;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
