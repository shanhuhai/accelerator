<?php

namespace App\Http\Controllers\Api;

use App\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    //

    public function listMissions(Request $request) {
        $pageSize = $request->get('pageSize', 20);
        $missions = Mission::paginate($pageSize);
        return [
            'code'=>0,
            'data'=>$missions
        ];
    }

    public function getMissionDivisions($id) {
        $id = $id ? $id :1;

        $divisions = Mission::find($id)->divisions;

        return [
            'code'=>0,
            'data'=>$divisions,
        ];
    }
}
