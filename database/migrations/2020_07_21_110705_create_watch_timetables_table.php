<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWatchTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_timetables', function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("timetable_id");
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
        Schema::dropIfExists('watch_timetables');
    }
}
