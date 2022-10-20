<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductFeatureValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_feature_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('product_id');
            $table->uuid('feature_id');
            $table->uuid('feature_value_id');
            $table->bigInteger('block_id')->unsigned()->nullable();
            $table->integer('sequence');
            $table->integer('highlighted')->nullable();
            $table->foreign('product_id', 'product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('feature_id', 'feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->foreign('feature_value_id', 'feature_value_id')->references('id')->on('feature_values')->onDelete('cascade');
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
        Schema::dropIfExists('product_feature_values');
    }
}
