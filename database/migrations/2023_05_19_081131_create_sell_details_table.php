<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_details', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->double("cost_price");
            $table->double("sell_price");
            $table->string("status");
            $table->unsignedBigInteger("sell_id");
            $table->unsignedBigInteger("product_id");
            $table->timestamps();
            $table->foreign("sell_id")->references("id")->on("sells")->onDelete("cascade");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_details');
    }
}
