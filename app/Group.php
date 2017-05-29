<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use softDeletes;
    protected $dates=['deleted_at'];

    protected $fillable=[

        'name'

    ];
    public function project(){

        return $this->belongsTo(Project::class);
    }
}
