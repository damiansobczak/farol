<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('image')->nullable();
            $table->string('imageAlt')->nullable();
            $table->foreignId('color_id')->nullable()->constrained('colors');
            $table->foreignId('collection_id')->nullable()->constrained('collections');
            $table->boolean('property_gummed')->nullable()->default(false);
            $table->boolean('property_blackout')->nullable()->default(false);
            $table->boolean('property_onecolor')->nullable()->default(false);
            $table->boolean('property_patterned')->nullable()->default(false);
            $table->boolean('property_washing')->nullable()->default(false);
            $table->boolean('property_flame_retardant')->nullable()->default(false);
            $table->boolean('property_teflon')->nullable()->default(false);
            $table->boolean('property_pvc_free')->nullable()->default(false);
            $table->boolean('property_office')->nullable()->default(false);
            $table->boolean('property_rebound')->nullable()->default(false);
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
        Schema::dropIfExists('materials');
    }
}
