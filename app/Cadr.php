<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadr extends Model
{
    //
    protected $fillable=[

        'fname',
        'lname',
        'nationalcode',
        'fathername',
        'cardnumber',
        'birthdate',
        'cellphone',
        'telephone',
        'address',
        'photo_id',
        'postalcode',
        'email',
        'is_active',
        'degree_id',
        'accountnumber',
        'field_id',
        'major_id',
        'university_id',
        'rank',
        'unit_id',


    ];
    public function projects(){

        return $this->belongsToMany(Project::class);
    }
    public function field(){

        return $this->belongsTo(Field::class);
    }
    public function major(){

        return $this->belongsTo(Major::class);
    }
    public function unit(){

        return $this->belongsTo(Unit::class);
    }
}
