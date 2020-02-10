<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];
    protected $table = 'categories';

    public function post(){
        return $this->hasOne('App\Post');
    }

    public function countpost(){
        return $this->hasMany('App\Post');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
