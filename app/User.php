<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
       'role_id','name','username','email','password','user_about','user_picture',
       ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


         public function role()
         {
        return $this->belongsTo('App\Role','role_id');
        }

        public function postes()
        {
         return $this->hasMany('App\Post','user_id');
       }

       public function favorit_to_post()
       {
           return $this->belongsToMany('App\Post', 'post_user', 'user_id' , 'post_id')->withTimestamps();
       }

       public function comment()
       {
           return $this->hasMany('App\Comment','user_id');
       }
       public function replyes()
       {
           return $this->hasMany('App\Reply','user_id');
       }
}
