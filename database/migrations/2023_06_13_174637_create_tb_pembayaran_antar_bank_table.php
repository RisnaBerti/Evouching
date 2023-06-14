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
        Schema::create('tb_pembayaran_antar_bank', function (Blueprint $table) {
            $table->uuid('id_pembayaran_antar_bank', 40)->primary()->comment('UUID');
            $table->string('no_resi_penerimaan_antar_bank', 10);
            $table->string('tanggal_penerimaan_antar_bank', 25);
            $table->string('total_dana', 25);
            $table->string('terbilang', 100);
            $table->string('keperluan', 50);
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
        Schema::dropIfExists('tb_pembayaran_antar_bank');
    }
};
