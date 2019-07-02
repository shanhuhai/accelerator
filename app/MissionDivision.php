<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class MissionDivision extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    //
    protected $fillable = ['mission_id', 'man_day', 'score', 'deadline', 'actual_time', 'delay', 'delay_note', 'progress', 'role', 'assigned_to'];


}
