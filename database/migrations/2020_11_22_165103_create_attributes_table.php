<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attributes', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('attributeType');
			$table->foreignId('attributeType')->references('id')->on('attribute_types');
			$table->string('name');
			$table->string('image');
			$table->string('imageAlt');
			$table->integer('minValue');
			$table->integer('maxValue');
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
		Schema::dropIfExists('attributes');
	}
}
