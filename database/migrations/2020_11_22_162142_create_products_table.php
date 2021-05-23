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
			$table->foreignId('categoryId')->references('id')->on('categories');
			$table->string('imageAlt')->nullable();
			$table->string('image')->nullable();
			$table->string('featured')->nullable()->default(false);
			$table->string('title');
			$table->text('description');
			$table->boolean('show')->nullable()->default(false);
			$table->string('gallery')->nullable();
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
