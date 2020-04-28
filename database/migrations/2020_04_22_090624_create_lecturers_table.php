<?php

use App\Enum\LecturerState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lang');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->text('description')->nullable();
            $table->date('created_at');
            $table->date('last_login')->nullable();
            $table->unsignedTinyInteger('state')->default(LecturerState::ACTIVE);
            $table->string('remember_token')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
