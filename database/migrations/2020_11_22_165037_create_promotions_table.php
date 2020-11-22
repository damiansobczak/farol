<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promotions', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->double('priceNet');
			$table->double('priceGross');
			$table->boolean('active');
			$table->timestamp('startDate');
			$table->timestamp('endDate');
			$table->foreignId('productId')->references('id')->on('products');
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
		Schema::dropIfExists('promotions');
	}
}
