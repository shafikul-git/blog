<?php

namespace App\Models\post;

use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories(){
        return $this->belongsToMany(Category::class, 'post_category');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
    public function users(){
        return $this->hasMany(User::class, 'id', 'author_id');
    }
}
