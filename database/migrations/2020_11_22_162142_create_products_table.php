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
			$table->string('image');
			$table->string('attributeTypes');
			$table->text('priceList');
			$table->integer('minWidth');
			$table->integer('maxWidth');
			$table->integer('minHeight');
			$table->integer('maxHeight');
			$table->string('featured')->nullable()->default(false);
			$table->text('description');
			$table->boolean('show')->nullable()->default(false);
			$table->string('avaibility')->nullable()->default(false);
			$table->string('gallery')->nullable();
			$table->string('seoTitle')->nullable();
			$table->string('seoDescription')->nullable();
			$table->string('ogTitle')->nullable();
			$table->string('ogDesc')->nullable();
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
