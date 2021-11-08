<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory,
        HasUuid;
    protected $guarded = ['id'];
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';
    public $incrementing = false;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
