<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("admins", function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->string("name");
            $table->char("lang", 2);
            $table->string("username")->unique();
            $table->char("password", 32);
            $table->date("created_at");
            $table->date("last_login")->nullable();
            $table->string("remember_token")->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("admins");
    }
}
