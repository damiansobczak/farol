<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersLinesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_lines', function (Blueprint $table) {
			$table->id();
			$table->integer('productId');
			$table->integer('orderId');
			$table->integer('quantity');
			$table->integer('singlePrice');
			$table->integer('promotionPrice');
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
		Schema::dropIfExists('orders_lines');
	}
}
