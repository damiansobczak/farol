<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisationGalleriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realisation_galleries', function (Blueprint $table) {
			$table->id();
			$table->string('image');
			$table->string('imageAlt');
			$table->string('video');
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
		Schema::dropIfExists('realisation_galleries');
	}
}
