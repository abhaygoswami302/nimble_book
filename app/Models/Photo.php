<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'username', 'caption', 'image'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'likes',  'photo_id', 'user_id');
    }
}
