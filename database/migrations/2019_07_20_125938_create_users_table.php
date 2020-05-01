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
        Schema::create("users", function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->string("name");
            $table->unsignedTinyInteger("type");
            $table->char("lang", 2);
            $table->unsignedTinyInteger("stage")->nullable();
            $table->string("email")->unique();
            $table->string("phone")->unique();
            $table->char("password", 32);
            $table->unsignedTinyInteger("gender");
            $table->char("country", 2);
            $table->date("birth_date")->nullable();
            $table->string("address")->nullable();
            $table->unsignedTinyInteger("certificate")->nullable();
            $table->date("created_at");
            $table->date("last_login")->nullable();
            $table->unsignedTinyInteger("state")->default(UserState::UNTRUSTED);
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
        Schema::dropIfExists("users");
    }
}
