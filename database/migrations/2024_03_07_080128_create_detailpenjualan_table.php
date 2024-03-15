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
        Schema::create('detailpenjualan', function (Blueprint $table) {
            $table->increments('detailid');
            $table->unsignedInteger('penjualanid');
            $table->unsignedInteger('produkid');
            $table->integer('jumlah_produk');
            $table->decimal('subtotal', 10, 2);
            $table->foreign('penjualanid')->references('penjualanid')->on('penjualan')->onDelete('cascade');
            $table->foreign('produkid')->references('produkid')->on('produk')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpenjualan');
    }
};
