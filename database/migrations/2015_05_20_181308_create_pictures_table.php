<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('itdept_test', function(Blueprint $table)
        {
            //$table->bigIncrements('id');
            $table->char('name', 40);
            $table->string('ext');
            $table->bigInteger('uploaded');
            $table->integer('size');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itdept_test');
    }
}
