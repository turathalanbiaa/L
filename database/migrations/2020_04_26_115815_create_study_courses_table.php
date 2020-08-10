<?php

use App\Enum\CourseState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->bigIncrements("id");
            $table->string("name");
            $table->char("lang", 2);
            $table->string("description")->nullable();
            $table->string("image");
            $table->unsignedTinyInteger("stage");
            $table->unsignedTinyInteger("state")->default(CourseState::ACTIVE);
            $table->unsignedBigInteger("lecturer_id");
            $table->timestamp("created_at")->default(DB::raw("CURRENT_TIMESTAMP"));
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
        Schema::dropIfExists("study_courses");
    }
}
