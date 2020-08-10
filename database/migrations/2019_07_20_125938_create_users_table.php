<?php

use App\Enum\Stage;
use App\Enum\UserState;
use Illuminate\Support\Facades\DB;
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
            $table->bigIncrements("id");
            $table->string("name");
            $table->unsignedTinyInteger("type");
            $table->char("lang", 2);
            $table->unsignedTinyInteger("stage")->nullable()->default(Stage::BEGINNER_STAGE);
            $table->string("email")->unique();
            $table->string("phone")->unique();
            $table->char("password", 32);
            $table->unsignedTinyInteger("gender");
            $table->char("country", 2);
            $table->date("birth_date")->nullable();
            $table->string("address")->nullable();
            $table->unsignedTinyInteger("certificate")->nullable();
            $table->unsignedTinyInteger("state")->default(UserState::UNTRUSTED);
            $table->timestamp("last_login")->default(DB::raw("CURRENT_TIMESTAMP"))->nullable();
            $table->string("token")->unique()->nullable();
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
        Schema::dropIfExists("users");
    }
}
