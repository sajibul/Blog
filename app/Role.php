<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'role_name',
    ];

     protected $primaryKey = 'role_id';


     public function users()
     {
    return $this->hasMany('App\User','role_id','role_id');
    }
}
