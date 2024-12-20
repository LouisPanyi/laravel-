<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('kode_transaksi')->primary();
            $table->foreignId('id_pemilik')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('id_karyawan')->nullable()->constrained('karyawan')->onDelete('set null');
            // Use string instead of foreignId for alphanumeric 'id_member'
            $table->string('id_member');  // Changed to string to match 'id' in pelanggan table
            $table->date('tgl_transaksi');
            $table->float('total_harga', 2);
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
