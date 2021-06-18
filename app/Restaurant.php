<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $fillable = [
      'name',
      'address',
      'logo',
      'description',
      'banner',
      'available',
      'slug',
      'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  };
}
