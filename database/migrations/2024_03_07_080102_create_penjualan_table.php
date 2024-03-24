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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('penjualanid');
            $table->date('tanggal_penjualan')->nullable();
            $table->decimal('total_harga', 10, 2)->nullable();
            $table->unsignedInteger('pelangganid')->nullable();
            $table->foreign('pelangganid')->references('pelangganid')->on('pelanggan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
