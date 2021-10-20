<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
  public static function bootHasUuid()
  {
    self::creating(function($model) {
      $model->id = Str::uuid()
        ->toString();
    });
  }
}
