<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesMainlabalAttributsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_mainlabal_attributs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namear');
            $table->string('nameen');
            $table->integer('id_label')->index();
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
        Schema::dropIfExists('services_mainlabal_attributs');
    }
}
