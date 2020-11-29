<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSEOSTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_s_e_o_s', function (Blueprint $table) {
			$table->id();
			$table->string('seoTitle')->nullable();
			$table->string('seoDescription')->nullable();
			$table->string('ogTitle')->nullable();
			$table->string('ogDescription')->nullable();
			$table->foreignId('postId')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('post_s_e_o_s');
	}
}
