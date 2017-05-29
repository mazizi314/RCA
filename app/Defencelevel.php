<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defencelevel extends Model
{
    //
    protected $fillable=[

        'name'

    ];
    public function projects(){

        return $this->hasMany(Project::class);
    }
}
