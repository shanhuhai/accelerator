<?php

use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //填充项目
        $project = \App\Project::create([
            'name'=> '长江日报'
        ]);

        $season1 = \App\Season::create([
            'project_id' => $project->id,
            'name' => '一期'
        ]);
        $season2 = \App\Season::create([
            'project_id' => $project->id,
            'name' => '二期'
        ]);

        $project = \App\Project::create([
            'name'=> '东莞'
        ]);
        \App\Season::create([
            'project_id' => $project->id,
            'name' => '一期'
        ]);
        \App\Season::create([
            'project_id' => $project->id,
            'name' => '二期'
        ]);

        $project = \App\Project::create([
            'name'=> '赣云'
        ]);
        \App\Season::create([
            'project_id' => $project->id,
            'name' => '一期'
        ]);
        \App\Season::create([
            'project_id' => $project->id,
            'name' => '二期'
        ]);


        //填充任务
        for ($i = 0 ; $i< 100; $i++ ) {
            $mission = \App\Mission::create([
                'season_id'=>$i%2 ==0 ? $season1->id : $season2->id,
                'title'=>'xxx'.$i,
                'description'=>'简介'.$i,
                'review'=> 'yyy'.$i,
                'reviewer_id'=>1,
                'tech_review' =>'zzzz'.$i,
                'tech_reviewer_id' => 1,

                'note'=> '备注'.$i
            ]);
            for ($j=0; $j<5; $j++) {
                \App\MissionDivision::create([
                    'mission_id'=>$mission->id,
                    'man_day' => mt_rand(1,20),
                    'score' => mt_rand(1, 10),
                    'deadline' => today(),
                    'actual_time' => \Illuminate\Support\Facades\Date::tomorrow(),
                    'delay' => mt_rand(0,1),
                    'delay_note' => '延期原因'.$i.'-'.$j,
                    'progress' => [0.8, 0.9, 1][mt_rand(0,2)],
                    'assigned_to' => 1,
                    'role'=>['前端', '后端', '安卓', 'IOS','UI','产品经理'][mt_rand(0,5)]
                ]);
            }
        }

        //'title', 'review', 'reviewer_id', 'tech_review', 'tech_review_id', 'man_day', 'score', 'deadline', 'progress', 'principal_id'

    }
}
