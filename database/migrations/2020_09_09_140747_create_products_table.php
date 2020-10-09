<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
//            $table->id();
            $table->increments('id');
            $table->string("title");
            $table->string("sku")->unique();
            $table->string("slug")->unique();
            $table->tinyInteger("status");
            $table->float("price");
            $table->float("discount_price")->nullable();
            $table->text("description");
            $table->integer("count");



//            $table->unsignedInteger("category_id");
//            $table->unsignedBigInteger("category_id");
//            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");

//            $table->unsignedInteger("user_id");
//            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");


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
        Schema::dropIfExists('products');
    }
}
