<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_leaves',
            'leaves_id',
            'user_id',
            'id',
            'id'
        )->withPivot(['id','created_at','status','number_days','reason']);
    }
    public function approved(){
        return $this->users()->wherePivot('status','approved');
    }
    public function pending(){
        return $this->users()->wherePivot('status','pending');
    }
    public function canceled(){
        return $this->users()->wherePivot('status','canceled');
    }
}
