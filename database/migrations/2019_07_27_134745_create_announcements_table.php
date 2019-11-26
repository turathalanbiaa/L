<?php

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
        Schema::create('announcements', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('lang');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('youtube_video_id')->nullable();
            $table->integer('type');
            $table->integer('state');
            $table->date('publish_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
