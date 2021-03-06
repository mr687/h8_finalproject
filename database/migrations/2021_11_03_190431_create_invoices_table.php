<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('order_id')->unique()->index();
            $table->foreignUuid('customer_id')
                ->nullable()
                ->references('id')
                ->on('customers')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->bigInteger('total')->default(0);
            $table->enum('status', ['pending', 'process', 'deliver', 'done'])->default('pending');
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
        Schema::dropIfExists('invoices');
    }
}
