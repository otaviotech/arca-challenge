<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Business extends Model
{
  protected $hidden = ['pivot', 'created_at', 'updated_at'];

  protected $fillable = ['title', 'phone', 'address', 'cep', 'city', 'state', 'description'];

  public function categories()
  {
      return $this->belongsToMany(Category::class);
  }
}
