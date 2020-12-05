<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function (Blueprint $table) {
			$table->id();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->string('actionName')->nullable();
			$table->string('actionLink')->nullable();
			$table->string('image')->nullable();
			$table->string('imageAlt')->nullable();
			$table->string('onlyImage')->nullable();
			$table->string('onlyImageLink')->nullable();
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
		Schema::dropIfExists('sliders');
	}
}
