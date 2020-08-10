<?php

use App\Enum\AnnouncementState;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("announcements", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title");
            $table->char("lang", 2);
            $table->text("description")->nullable();
            $table->string("image")->nullable();
            $table->string("youtube_video")->nullable();
            $table->unsignedTinyInteger("type");
            $table->unsignedTinyInteger("state")->default(AnnouncementState::ACTIVE);
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
        Schema::dropIfExists("announcements");
    }
}
