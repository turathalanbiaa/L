<?php

use App\Enum\ReviewState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("reviews", function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("course_id");
            $table->unsignedTinyInteger("type");
            $table->unsignedTinyInteger("rate");
            $table->string("comment");
            $table->unsignedTinyInteger("state")->default(ReviewState::VISIBLE);
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
        Schema::dropIfExists("reviews");
    }
}
