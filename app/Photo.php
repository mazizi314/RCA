<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
//    public $uploads= public_path();
//protected $myPublicFolder = public_path();

    protected $uploads = 'images/';
//


    protected $fillable =['file'];

    public function getFileAttribute($photo){


        return $this->uploads.$photo;


    }

}
