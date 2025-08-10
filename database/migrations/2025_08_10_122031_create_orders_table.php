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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id_order
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade'); // FK ke tabel pelanggan
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade'); // FK ke tabel layanan
            $table->integer('jumlah_item'); // Jumlah unit/kg
            $table->decimal('total_harga', 10, 2); // Total harga
            $table->text('pesan')->nullable(); // Catatan khusus
            $table->enum('status_order', ['Menunggu', 'Proses', 'Selesai', 'Dalam Pengiriman', 'Dibatalkan'])->default('Menunggu');
            $table->dateTime('tanggal_order')->useCurrent();
            $table->dateTime('tanggal_selesai')->nullable();
            $table->enum('metode_pembayaran', ['Cash', 'Transfer', 'E-Wallet'])->nullable();
            $table->enum('status_pembayaran', ['Belum Bayar', 'Menunggu Konfirmasi', 'Lunas'])->default('Belum Bayar');
            $table->string('bukti_pembayaran')->nullable(); // Path/file bukti
            $table->foreignId('admin_input')->nullable()->constrained('users')->onDelete('set null'); // Admin yang input
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
