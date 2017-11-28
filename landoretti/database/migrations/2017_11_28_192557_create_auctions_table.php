<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("style");
            $table->time("year");
            $table->integer("width");
            $table->integer("height");
            $table->integer("depth");
            $table->longText("description");
            $table->longText("condition");
            $table->string("origin");
            $table->string("photo1");
            $table->integer("minimumestimatedprice");
            $table->integer("maximumestimatedprice");
            $table->integer("buyoutprice");
            $table->date("enddate");
            $table->boolean("conditionsaccepted");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}
