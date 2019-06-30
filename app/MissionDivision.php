<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionDivision extends Model
{
    //
    protected $fillable = ['mission_id', 'man_day', 'score', 'deadline', 'actual_time', 'delay', 'delay_note', 'progress', 'role', 'principal_id'];
}
