<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany('products');
    }
    public function parent()
    {
        return $this->belongsTo('categories', 'parent_id');
    }
    public function child()
    {
        return $this->hasMany('categories', 'parent_id', 'id');
    }
}
