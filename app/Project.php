<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name'];

    public function seasons(){
        return $this->hasMany('App\Season', 'project_id', 'id');
    }
}
