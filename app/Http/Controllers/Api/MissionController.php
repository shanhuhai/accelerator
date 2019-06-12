<?php

namespace App\Http\Controllers\Api;

use App\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    //

    public function listMissions() {
        $missions = Mission::all();
        return [
            'code'=>0,
            'data'=>$missions
        ];
    }
}
