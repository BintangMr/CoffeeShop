<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('article_id');
            $table->string('original_filename');
            $table->string('modified_filename');
            $table->string('extension');
            $table->bigInteger('size');
            $table->timestamps();

            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_images');
    }
}
