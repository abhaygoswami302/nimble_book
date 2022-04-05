<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcomment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id','user_id',  'username','comment'];

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
