<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesMainlabalAttributvaluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_mainlabal_attributvalues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_attribut')->index();
            $table->integer('id_value')->index();
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
        Schema::dropIfExists('services_mainlabal_attributvalues');
    }
}
