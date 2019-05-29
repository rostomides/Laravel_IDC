<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biog extends Model
{

    protected $fillable = [
        'image_path', 'name', 'body'
    ];

    public function blogs(){
        return $this->hasMany('App\Blog');
    }
}
