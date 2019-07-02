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
            $table->text('description')->comment('任务简介');

            //评审
            $table->text('review')->comment('需求评审结果');
            $table->unsignedBigInteger('reviewer_id')->comment('需求评审人id');
            $table->text('tech_review')->comment('技术评审结果');
            $table->unsignedBigInteger('tech_reviewer_id')->comment('技术评审人');

            //备注
            $table->text('note')->comment('备注');
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
        Schema::dropIfExists('missions');
    }
}
