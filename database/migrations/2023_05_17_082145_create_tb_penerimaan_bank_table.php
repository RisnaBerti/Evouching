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
        Schema::create('tb_penerimaan_bank', function (Blueprint $table) {
            $table->uuid('id_penerimaan_bank', 40)->primary()->comment('UUID');
            $table->string('no_resi_terima_bank', 10);
            $table->date('tanggal_penerimaan_bank');
            $table->binary('bukti_transaksi', 40);
            $table->boolean('status', 1)->default(0);
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
        Schema::dropIfExists('tb_penerimaan_bank');
    }
};
