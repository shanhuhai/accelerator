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
        //
        for ($i = 0 ; $i< 100; $i++ ) {
            $mission = \App\Mission::create([
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
                    'principal_id' => 1,
                    'role'=>['前端', '后端', '安卓', 'IOS','UI','产品经理'][mt_rand(0,5)]
                ]);
            }
        }

        //'title', 'review', 'reviewer_id', 'tech_review', 'tech_review_id', 'man_day', 'score', 'deadline', 'progress', 'principal_id'

    }
}
