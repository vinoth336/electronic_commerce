<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductSpecificationValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_specification_values');

        Schema::create('product_specification_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('product_id');
            $table->uuid('specification_id');
            $table->uuid('specification_value_id');
            $table->bigInteger('block_id')->unsigned()->nullable();
            $table->integer('sequence');
            $table->integer('highlighted')->nullable();
            $table->foreign('product_id', 'product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('specification_id', 'specification_id')->references('id')->on('specifications')->onDelete('cascade');
            $table->foreign('specification_value_id', 'specification_value_id')->references('id')->on('specification_values')->onDelete('cascade');
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
        Schema::dropIfExists('product_specification_values');
    }
}
