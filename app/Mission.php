<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Mission extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    //
    protected $fillable = ['season_id','title', 'review', 'reviewer_id', 'tech_review', 'tech_review_id', 'man_day', 'score', 'deadline', 'progress', 'principal_id'];

    public function divisions(){
        return $this->hasMany('App\MissionDivision', 'mission_id', 'id');
    }
}
