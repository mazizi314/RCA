<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //
    protected $fillable=[

        'name','field_id',

    ];
    public function person(){

        return $this->belongsTo('App\Person');
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    public function persons(){

        return $this->hasMany(Person::class);
    }
    public function cadrs(){

        return $this->hasMany(Cadr::class);
    }
}
