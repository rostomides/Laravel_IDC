<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theme extends Model
{
    protected $fillable = [
        'theme'
    ];

    public function blogs(){
        return $this->hasMany('App\Blog');
    }
    
}
