<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasUuid;

    protected $uuidFieldName = 'id';
    protected $guarded = ['id'];
    protected $keyType = 'string';
    public $incrementing = false;

    protected $with = ['parent'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
