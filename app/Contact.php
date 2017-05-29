<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    //
    use softDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[

        'name',
        'priority',
        'user_id'

    ];

    public function letters(){

        return $this->hasMany(Lettere::class);
    }



}
