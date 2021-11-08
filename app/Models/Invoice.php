<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory,
        HasUuid;
    protected $guarded = ['id'];
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';
    public $incrementing = false;

    public function detail()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
