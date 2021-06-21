<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->string('name');
            $table->longText('simple_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->decimal('original_price')->default(0);
            $table->decimal('discount_price')->nullable();
            $table->string('market_url')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories')
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
        Schema::dropIfExists('products');
    }
}
