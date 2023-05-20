<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string("name");
            $table->double("sell_price");
            $table->double("cost_price");
            $table->longText("description")->nullable();
            $table->string("image")->nullable();
            $table->unsignedBigInteger("product_type_id");
            $table->timestamps();
            $table->foreign("product_type_id")->references("id")->on("product_types")->onDelete("cascade");
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
