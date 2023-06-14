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
        Schema::create('tb_ca', function (Blueprint $table) {
            $table->uuid('id_ca', 40)->primary()->comment('UUID');
            $table->string('no_resi_ca', 10);
            $table->date('tanggal_penerimaan_ca');
            $table->string('bukti_transaksi', 20);
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
        Schema::dropIfExists('tb_ca');
    }
};
