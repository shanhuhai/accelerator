<?php

namespace App\Http\Controllers\Api;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    //
    public function tree() {
        $projects = Project::select('id', DB::raw('name as label'))->get();

//        foreach ($projects as $project) {
//            //$seasons = $project->seasons()->pluck('id', 'name')->get();
//
//            $seasons = $project->seasons()->select(DB::raw('name as label'),'id')->get();
//
//            $seasons = $seasons->map(function ($item, $key){
//                $item->children = [];
//                return $item;
//            });
//
//            $return[] = ['id'=>$project->id,'label'=>$project->name, 'children'=>$seasons];
//        }

        // 重新构造响应数据
        $projects = $projects->map(function($project, $key){
            $seasons = $project->seasons()->select(DB::raw('name as label'),'id')->get();
            $seasons = $seasons->map(function ($item, $key){
                $item->children = [];
                $item->leaf = true;
                return $item;
            });
            $project->children = $seasons;
            return $project;
        });

        return ['code'=>0, 'data'=>$projects];
    }
}
