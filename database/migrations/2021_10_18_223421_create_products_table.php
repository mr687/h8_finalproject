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
            $table->foreignUuid('category_id')
                ->references('id')
                ->on('categories')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->string('name');
            $table->integer('weight')->default(0);
            $table->bigInteger('price')->default(0);
            $table->enum('status', ['Draft', 'Publish'])
                ->default('Draft');
            $table->string('image_url')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
