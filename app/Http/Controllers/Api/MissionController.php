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

        $divisions = Mission::find($id)->divisions()
            ->get(['man_day', 'score', 'deadline', 'actual_time', 'delay','delay_note','progress', 'role','assigned_to']);

        return [
            'code'=>0,
            'data'=>$divisions,
        ];
    }

    public function deleteMission($id) {
        //Todo 参数合法性验证
        //Todo 支持事务
        Mission::find($id)->divisions()->delete();
        Mission::find($id)->delete();
    }
}
