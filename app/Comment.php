<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = [
    'post_id','user_id','comment',
    ];

  public function user()
  {
   return $this->belongsTo('App\User');
  }

  public function post()
  {
   return $this->belongsTo('App\Post');
  }

  public function reply()
  {
    return $this->hasMany('App\Reply','comment_id');
  }



}
