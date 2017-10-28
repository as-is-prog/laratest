<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $guarded = array('id');

    public function createdUser(){
        return $this->belongsTo('App\User','userid');
    }

    public function joinedUsers(){
        return $this->belongsToMany('App\User','projects_users','projectid','userid');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','projects_tags','projectid','tagid');
    }
}
