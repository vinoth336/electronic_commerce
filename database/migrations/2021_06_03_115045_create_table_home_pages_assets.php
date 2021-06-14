<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHomePagesAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('home_page_assets');
        Schema::create('home_page_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('home_page_id');
            $table->string('type');
            $table->string('url');
            $table->foreign('home_page_id')->references('id')->on('home_pages')->onDelete('cascade');
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
        Schema::dropIfExists('home_page_assets');
    }
}
