<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('birthday');
            $table->tinyInteger('gender');
            $table->string('national_code');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references("id")->on("users")->onDelete("cascade");


//            $table->timestamp('email_verified_at')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
