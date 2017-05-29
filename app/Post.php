<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    //
    use SearchableTrait;
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'posts.title' => 10,
            'posts.body' => 5,
//            'users.name' => 5,
////            'users.lname' => 10,
//            'users.is_active' => 2,
//            'users.email' => 1,

        ]//,
//        'joins' => [
//            'posts' => ['users.id','posts.user_id'],
//        ],
    ];
     protected $fillable = [

         'category_id',
         'photo_id',
         'title',
         'body'

     ];

     public function user(){

       return $this->belongsTo('App\User');
     }
    public function photo(){

        return $this->belongsTo('App\Photo');
    }
    public function category(){

        return $this->belongsTo('App\Category');
    }

}
