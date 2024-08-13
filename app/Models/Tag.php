<?php

namespace App\Models;

use App\Models\post\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
