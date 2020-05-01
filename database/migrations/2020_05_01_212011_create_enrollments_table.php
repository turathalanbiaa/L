<?php

use App\Enum\EnrollmentState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("enrollments", function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("general_course_id");
            $table->unsignedTinyInteger("state")->default(EnrollmentState::SUBSCRIBE);
            $table->date("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("enrollments");
    }
}
