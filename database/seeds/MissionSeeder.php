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
            \App\Mission::create([
                'title'=>'xxx'.$i,
                'review'=> 'yyy'.$i,
                'reviewer_id'=>1,
                'tech_review' =>'zzzz'.$i,
                'tech_reviewer_id' => 1,
                'man_day' => mt_rand(1,20),
                'score' => mt_rand(1, 10),
                'deadline' => today(),
                'progress' => array_rand([0.8, 0.9, 1]),
                'principal_id' => 1,
                'note'=> 'aaaaa'.$i
            ]);
        }

        //'title', 'review', 'reviewer_id', 'tech_review', 'tech_review_id', 'man_day', 'score', 'deadline', 'progress', 'principal_id'

    }
}
