<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //
    protected $fillable=[

        'name'

    ];
    public function persons(){

        return $this->hasMany(Person::class);
    }
}
