<?php

use App\Enum\UserState;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('type');
            $table->string('lang');
            $table->tinyInteger('stage')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->tinyInteger('gender');
            $table->string('country');
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('certificate')->nullable();
            $table->date('created_at');
            $table->date('last_login')->nullable();
            $table->tinyInteger("state")->default(UserState::UNTRUSTED);
            $table->string("remember_token")->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
