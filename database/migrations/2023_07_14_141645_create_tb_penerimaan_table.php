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
        Schema::create('tb_penerimaan', function (Blueprint $table) {
            $table->string('id_penerimaan', 40)->primary()->uuid();
            $table->string('no_resi_terima_bank', 36)->nullable();
            $table->string('tanggal_penerimaan_bank')->nullable();
            $table->string('bukti_transaksi_bank', 36)->nullable();
            $table->string('no_resi_terima_kas', 36)->nullable();
            $table->string('tanggal_penerimaan_kas')->nullable();
            $table->string('bukti_transaksi_kas', 36)->nullable();
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
        Schema::dropIfExists('tb_penerimaan');
    }
};
