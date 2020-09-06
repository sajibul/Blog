<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


  public function tages()
  {
    return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
  }
  public function categories()
  {
    return $this->belongsToMany('App\Category', 'category_post', 'post_id', 'category_id');
  }
  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function favorit_to_user()
  {
      return $this->belongsToMany('App\User', 'post_user', 'post_id', 'user_id')->withTimestamps();
  }
  public function comment()
  {
      return $this->hasMany('App\Comment','post_id');
  }


}
