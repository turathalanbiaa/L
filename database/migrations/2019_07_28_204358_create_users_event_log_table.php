<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEventLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_event_log', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('content');
            $table->unsignedInteger('target_id');
            $table->unsignedTinyInteger('target_type');
            $table->string('note');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_event_log');
    }
}
