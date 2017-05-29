<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Letter extends Model
{
    protected $dates=['deleted_at'];
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
            'letters.number' => 10,
            'letters.mozo' => 10,
//            'people.project_id' => 5,
            'letters.body' => 10,
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

        'number',
        'date',
        'mozo',
        'body',
        'description',
        'az',
        'be',
        'attachment',
        'attached_file_id',
        'photo_id',
        'project_id',
        'user_id',
        'lettertype_id'

    ];


    public function photo(){

        return $this->belongsTo(Photo::class);
    }
    public function project(){

        return $this->belongsTo(Project::class);
    }
    public function lettertype(){

        return $this->belongsTo(Lettertype::class);
    }
    public function az(){

        return $this->belongsTo(Contact::class);
    }
    public function be(){

        return $this->belongsTo(Contact::class);
    }
}
