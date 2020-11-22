<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adresses', function (Blueprint $table) {
			$table->id();
			$table->string('city');
			$table->string('postcode');
			$table->string('street');
			$table->string('building');
			$table->string('appartment');
			$table->boolean('isDefault');
			$table->unsignedBigInteger('clientId');
			$table->foreignId('clientId')->references('id')->on('clients');
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
		Schema::dropIfExists('adresses');
	}
}
