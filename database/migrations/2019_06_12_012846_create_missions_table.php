<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->comment('任务标题');
            $table->text('note')->comment('备注');

            //需求评审
            $table->text('review')->comment('需求评审结果');
            $table->unsignedBigInteger('reviewer_id')->comment('需求评审人id');
            $table->text('tech_review')->comment('技术评审结果');
            $table->unsignedBigInteger('tech_reviewer_id')->comment('技术评审人');

            //工时评估
            $table->unsignedInteger('man_day')->comment('对外工时评估,人日');

            //开发
            $table->text('score')->comment('任务评分');
            $table->date('deadline')->comment('任务结束时间');
            $table->decimal('progress')->comment('进度');
            $table->unsignedBigInteger('principal_id')->comment('任务负责人id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
