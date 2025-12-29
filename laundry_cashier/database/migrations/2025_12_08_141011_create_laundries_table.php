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
    Schema::create('laundries', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->string('jenis_baju');       
        $table->string('jenis_laundry');    

        $table->decimal('berat', 8, 2)->nullable();
        $table->integer('qty')->nullable();

        $table->decimal('harga', 12, 2);

        $table->enum('status', ['ongoing', 'selesai'])
            ->default('ongoing');

        $table->date('tanggal_masuk');
        $table->date('tanggal_selesai')->nullable();

        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundries');
    }
};
