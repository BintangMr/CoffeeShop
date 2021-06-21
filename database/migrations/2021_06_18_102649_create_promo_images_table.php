<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('promo_id');
            $table->string('original_filename');
            $table->string('modified_filename');
            $table->string('extension');
            $table->bigInteger('size');
            $table->timestamps();

            $table->foreign('promo_id')
                ->references('id')
                ->on('promos')
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
        Schema::dropIfExists('promo_images');
    }
}
