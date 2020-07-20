<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->string("title");
            $table->text("description")->nullable();
            $table->string("youtube_video");
            $table->time("video_length");
            $table->unsignedTinyInteger("order");
            $table->unsignedTinyInteger("seen");
            $table->unsignedInteger("lecturer_id");
            $table->unsignedInteger("course_id");
            $table->unsignedTinyInteger("course_type");
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp("updated_at")->default(DB::raw("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
