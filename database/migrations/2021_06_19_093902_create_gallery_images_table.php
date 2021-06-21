<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('original_filename');
            $table->string('modified_filename')->nullable();
            $table->string('extension');
            $table->bigInteger('size');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('gallery_images');
    }
}
