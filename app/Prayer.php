<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    protected $fillable = [
        'date','fajr','duhr','asr','maghrib','isha','sunrise'
    ];
}
