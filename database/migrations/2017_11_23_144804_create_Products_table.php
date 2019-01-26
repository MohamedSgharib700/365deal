<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titles');
            $table->string('descs');
            $table->integer('types');
            $table->string('images');
            $table->string('maps');
            $table->string('nashoniltes');
            $table->string('sitys');
            $table->string('strs');
            $table->integer('prics');
            $table->string('mails');
            $table->string('phones');
            $table->string('timeOfvers');
            
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
        //
    }
}
