<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('description',100);
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('tbl_models');
            $table->string('shelf',20);
            $table->string('manufacture',100);
            $table->unsignedSmallInteger('opening_balance');
            $table->unsignedInteger('UnitPrice');

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
};
