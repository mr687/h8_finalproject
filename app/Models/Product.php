<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuid;

    protected $guarded = ['id'];
    protected $uuidFieldName = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
