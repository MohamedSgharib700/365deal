<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('Describe');
            $table->bigInteger('price');
            $table->integer('flag');
            $table->float('Rate');
            $table->integer('views');
            $table->string('shareurl');
            $table->timestamp('dataAppear');
            $table->integer('numdayAppear');
            $table->string('lan');
            $table->string('lat');
            $table->integer('OfferedRequired');
            $table->integer('id_address')->index();
            $table->integer('id_servicesMain')->index();
            $table->integer('id_user')->index();
            $table->integer('id_ican')->index();
            $table->integer('id_rang_prices')->index();
            $table->integer('id_categories')->index();
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
        Schema::dropIfExists('services_subs');
    }
}
