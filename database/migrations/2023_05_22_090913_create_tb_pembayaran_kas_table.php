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
        Schema::create('tb_pembayaran_kas', function (Blueprint $table) {
            $table->uuid('id_pembayaran_kas', 40)->primary()->comment('UUID');
            $table->string('no_resi_bayar_kas', 10);
            $table->date('tanggal_penerimaan_kas');
            $table->string('bukti_transaksi', 3);
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
        Schema::dropIfExists('tb_pembayaran_kas');
    }
};
