<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pembayaran', function (Blueprint $table) {
            $table->string('id_pembayaran', 40)->primary()->uuid();
            $table->string('no_resi_bayar_bank', 40)->nullable();
            $table->string('tanggal_pembayaran_bank')->nullable();
            $table->string('bukti_transaksi_bank', 40)->nullable();
            $table->string('no_resi_bayar_kas', 40)->nullable();
            $table->string('tanggal_pembayaran_kas')->nullable();
            $table->string('bukti_transaksi_kas', 40)->nullable();
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
        Schema::dropIfExists('tb_pembayaran');
    }
};
