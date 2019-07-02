<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_divisions', function (Blueprint $table) {
            $table->bigIncrements('id');

            //任务id
            $table->unsignedBigInteger('mission_id')->comment('任务id');

            //工时评估
            $table->unsignedInteger('man_day')->comment('对外工时评估,人日');

            //开发
            $table->text('score')->comment('任务评分');
            $table->date('deadline')->comment('任务结束时间');
            $table->date('actual_time')->comment('任务实际完成时间');
            $table->unsignedTinyInteger('delay')->comment('延期时间');
            $table->text('delay_note')->comment('延期原因');
            $table->decimal('progress')->comment('进度');
            //岗位
            $table->enum('role',['前端', '后端', '安卓', 'IOS','UI','产品经理'])->comment('岗位');
            $table->unsignedBigInteger('assigned_to')->comment('任务负责人id');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_divisions');
    }
}
