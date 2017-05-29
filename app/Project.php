<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Project extends Model
{
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
            'projects.title' => 10,
            'projects.number' => 5,
//            'projects.nationalcode' => 10,
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

        'title',
        'number',
        'opendate',
        'person_id',
        'category_id',
        'unit_id',
        'group_id',
        'photo_id',
        'cadr_id',
        'kasri1',
        'kasri2',
        'kasri3',
        'bookfishdate',
        'booksend',
        'bookcount',

];

    public function person(){

        return $this->belongsTo(Person::class);
    }
    public function unit(){

        return $this->belongsTo(Unit::class);
    }
    public function group(){

        return $this->belongsTo(Group::class);
    }
    public function category(){

        return $this->belongsTo(Category::class);
    }
    public function cadrs(){

        return $this->belongsToMany(Cadr::class)->withPivot('helptype_id');
    }
    public function defencelevels(){
        return $this->belongsToMany(Defencelevel::class)->withPivot('defencedate','letterdate','letternumber');
    }
    public function letters(){

        return $this->hasMany(Letter::class);
    }
}
