<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('slug')->nullable();
			$table->text('description');
			$table->string('image')->nullable();
			$table->string('imageAlt')->nullable();
			$table->boolean('show')->nullable()->default(true);
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
		Schema::dropIfExists('posts');
	}
}
