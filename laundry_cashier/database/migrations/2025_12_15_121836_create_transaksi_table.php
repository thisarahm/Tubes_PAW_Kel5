<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->date('tgl_terima');
        $table->string('kode');
        $table->date('tgl_ambil')->nullable();
        $table->string('pelanggan');
        $table->integer('total');
        $table->enum('status', ['SELESAI', 'ONGOING']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
