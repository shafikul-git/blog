<?php

namespace App\Models;

use App\Models\post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function posts(){
        return $this->belongsToMany(Post::class, 'post_category');
    }

    // public function tags(){
    //     return $this->belongsToMany(Tag::class, 'post_tag');
    // }

    public function users(){
        return $this->hasMany(User::class, 'id', 'author_id');
    }
}
