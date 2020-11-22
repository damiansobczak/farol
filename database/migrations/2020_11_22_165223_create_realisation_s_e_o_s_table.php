<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisationSEOSTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realisation_s_e_o_s', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('description');
			$table->string('ogTitle');
			$table->string('ogDesc');
			$table->string('ogImage');
			//$table->unsignedBigInteger('realisationId');
			$table->foreignId('realisationId')->references('id')->on('realisations');
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
		Schema::dropIfExists('realisation_s_e_o_s');
	}
}
