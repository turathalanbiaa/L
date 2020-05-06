<?php

use App\Enum\CourseState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("study_courses", function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->string("name");
            $table->char("lang", 2);
            $table->unsignedTinyInteger("stage");
            $table->unsignedInteger("lecturer_id");
            $table->text("description")->nullable();
            $table->unsignedTinyInteger("state")->default(CourseState::ACTIVE);
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
        Schema::dropIfExists("study_courses");
    }
}
