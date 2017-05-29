<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    protected $fillable=[

        'name'

    ];
    public function persons(){

        return $this->hasMany(Person::class);
    }
    public function majors(){

        return $this->hasMany(Major::class);
    }
    public function cadrs(){

        return $this->hasMany(Cadr::class);
    }

}
