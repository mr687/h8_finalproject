<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasOrderId
{
  public static function bootHasOrderId()
  {
    self::creating(function($model) {
      $date = date('Ymd');
      $random = strtoupper(Str::random(5));
      $model->order_id = "ORD-{$date}-{$random}";
    });
  }
}
