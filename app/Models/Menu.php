<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'user_id'];
    public function subMenu()
    {
        return  $this->hasMany(Menu::class, 'main_menu_id')->with('subMenu');
    }
}
