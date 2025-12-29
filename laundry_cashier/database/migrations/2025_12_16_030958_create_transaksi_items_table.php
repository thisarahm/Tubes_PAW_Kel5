<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transaksi_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('transaksi_id')
              ->constrained('transaksis')
              ->onDelete('cascade');
        $table->string('item');
        $table->integer('harga');
        $table->integer('qty');
        $table->integer('subtotal');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_items');
    }
};
