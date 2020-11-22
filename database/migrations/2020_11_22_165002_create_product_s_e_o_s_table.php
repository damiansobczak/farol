<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSEOSTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_s_e_o_s', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('description');
			$table->string('ogTitle');
			$table->string('ogDesc');
			$table->string('ogImage');
			$table->string('productId');
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
		Schema::dropIfExists('product_s_e_o_s');
	}
}
