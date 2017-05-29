<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Person extends Model
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
            'people.fname' => 10,
            'people.lname' => 5,
            'people.nationalcode' => 10,
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

        'fname',
        'lname',
        'nationalcode',
        'fathername',
        'cardnumber',
        'birthdate',
        'cellphone',
        'telephone',
        'address',
        'postalcode',
        'email',
        'is_active',
        'photo_id',
        'service_id',
        'service_date',
        'university_id',
        'field_id',
        'major_id',
        'cv_file_id',
        'cv_description',
        'nationalcode_file_id',
        'card_file_id',
        'address_file_id',
        'degree_file_id',
        'user_id',



    ];
    public function university(){

        return $this->belongsTo(University::class);
    }
    public function projects(){

        return $this->hasMany(Project::class);
    }
    public function user(){

        return $this->belongsTo('App\User');
    }
    public function photo(){

        return $this->belongsTo('App\Photo');
    }
    public function category(){

        return $this->belongsTo('App\Category');
    }
    public function field(){

        return $this->belongsTo(Field::class);
    }
    public function major(){

        return $this->belongsTo(Major::class);
    }
    public function getFullnameAttribute()
    {
        return $this->attributes['fname'].' '.$this->attributes['lname'];
    }
}
