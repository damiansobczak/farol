<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->string('slug');
			$table->string('name');
			$table->unsignedBigInteger('categoryId');
			$table->foreignId('categoryId')->references('id')->on('categories');
			$table->string('imageAlt');
			$table->string('image');
			$table->double('priceNet');
			$table->double('priceGross');
			$table->string('featured');
			$table->text('description');
			$table->boolean('show');
			$table->string('avaibility');
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
		Schema::dropIfExists('products');
	}
}
