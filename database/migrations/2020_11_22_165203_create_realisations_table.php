<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realisations', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->text('description');
			$table->string('image');
			$table->string('imageAlt')->nullable();
			$table->string('video')->nullable();
			$table->string('gallery')->nullable();
			$table->string('seoTitle')->nullable();
			$table->string('seoDescription')->nullable();
			$table->string('ogTitle')->nullable();
			$table->string('ogDescription')->nullable();
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
		Schema::dropIfExists('realisations');
	}
}
