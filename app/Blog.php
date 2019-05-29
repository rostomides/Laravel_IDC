<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
 
    protected $fillable = [
        'title', 'theme', 'category', 'publish', 'body'
    ];
 
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function theme(){
        return $this->belongsTo('App\Theme');
        // return $this->belongsToMany('App\Theme');
    }

    public function category(){
        return $this->belongsTo('App\Category');
        // return $this->belongsToMany('App\Category');
    }

    public function biog(){
        return $this->belongsTo('App\Biog');
        
    }
}
