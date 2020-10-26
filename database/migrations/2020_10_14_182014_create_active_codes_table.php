<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiveCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_codes', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('code');

            $table->string('phone');

//            $table->unique(['code','phone']);


            $table->string('expired_at');

//            $table->timestamps();
            $table->timestamps( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_codes');
    }
}
