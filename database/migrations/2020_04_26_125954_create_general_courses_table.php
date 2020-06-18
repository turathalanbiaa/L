<?php

use App\Enum\CourseState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("general_courses", function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->string("name");
            $table->unsignedInteger("general_course_header_id")->nullable();
            $table->unsignedInteger("lecturer_id");
            $table->char("lang", 2);
            $table->text("description")->nullable();
            $table->string("image");
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
        Schema::dropIfExists("general_courses");
    }
}
