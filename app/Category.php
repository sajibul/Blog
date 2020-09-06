<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


 //  protected $dispatchesEvents = [
 //     'created' => CategoryEvent::class,
 // ];


  public function post()
  {
    return $this->belongsToMany('App\Post', 'category_post','category_id','post_id');
  }
}
