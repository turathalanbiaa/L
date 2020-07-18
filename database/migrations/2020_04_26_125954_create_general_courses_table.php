<?php

use App\Enum\CourseState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->char("lang", 2);
            $table->string("description")->nullable();
            $table->string("image");
            $table->unsignedTinyInteger("state")->default(CourseState::ACTIVE);
            $table->unsignedInteger("general_course_header_id")->nullable();
            $table->unsignedInteger("lecturer_id");
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
        Schema::dropIfExists("general_courses");
    }
}
