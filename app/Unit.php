<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use softDeletes;
protected $dates=['deleted_at'];

    protected $fillable=[

        'name'

    ];
    public function projects(){

        return $this->hasMany(Project::class);
    }
    public function cadrs(){

        return $this->hasMany(Cadr::class);
    }
}
