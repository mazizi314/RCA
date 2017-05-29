<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lettertype extends Model
{
    //
    protected $fillable=[

        'name',
        'priority'

    ];

    public function letters(){

        $this->hasMany(Letter::class);
    }
}
