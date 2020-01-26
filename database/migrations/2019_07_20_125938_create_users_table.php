<?php

use App\Enum\VerifyState;
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
            $table->integer('type');
            $table->string('lang');
            $table->integer('level')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->integer('gender');
            $table->string('country');
            $table->string('image')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->integer('scientific_degree')->nullable();
            $table->date('created_at');
            $table->date('last_login_date')->nullable();
            $table->string("verify_state")->default(VerifyState::NOT_ACTIVE);
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
