<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    //
    protected $fillable = ['title', 'review', 'reviewer_id', 'tech_review', 'tech_review_id', 'man_day', 'score', 'deadline', 'progress', 'principal_id'];
}
