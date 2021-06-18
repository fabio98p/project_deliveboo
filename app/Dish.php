<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  protected $fillable = [
      'name',
      'description',
      'price',
      'available',
      'image',
      'slug'
  ];

  public function restaurant(){
       return $this->belongsTo('App\Restaurant');
   }
}
