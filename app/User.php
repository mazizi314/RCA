<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
            'users.name' => 10,
//            'users.lname' => 10,
            'users.is_active' => 2,
            'users.email' => 5,
            'posts.title' => 2,
            'posts.body' => 1,
        ],
        'joins' => [
            'posts' => ['users.id','posts.user_id'],
        ],
    ];
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function roles(){

        return $this->belongsToMany(Role::class,'user_role','role_id','user_id');

    }


    //from ACL video

    public function hasAnyRole($roles){

        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }

        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }

    public function setPasswordAttribute($password){

        if(!empty($password)){

            $this->attributes['password']=bcrypt($password);

        }


    }


    public function isAdmin(){

//        if('admin' == $this->role->name && $this->role->name == 1){
//
//            return true;
//
//        }
        return true;

    }


    public function posts(){

        return $this->hasMany('App\Post');

    }
}
