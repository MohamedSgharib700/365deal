<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagazinOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazin_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shareurl');
            $table->integer('numOfpage');
            $table->integer('numOfshare');
            $table->float('Rate');
            $table->integer('views');
            $table->text('des');

            $table->timestamp('dataAppear');
            $table->date('from');
            $table->date('to');

            $table->integer('id_market')->index();
            $table->integer('flag');
            $table->integer('flagcomment');
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
        Schema::dropIfExists('magazin_offers');
    }
}
