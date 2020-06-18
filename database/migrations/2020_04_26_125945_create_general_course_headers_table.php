<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralCourseHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("general_course_headers", function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->string("title");
            $table->string("description")->nullable();
            $table->text("details")->nullable();
            $table->text("image");
            $table->date("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("general_course_headers");
    }
}
