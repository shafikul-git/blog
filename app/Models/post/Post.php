<?php

namespace App\Models\post;

use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function Title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
        );
    }
}
