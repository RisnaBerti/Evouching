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
        Schema::create('tb_permohonan', function (Blueprint $table) {
            $table->string('id_permohonan', 40)->primary()->comment('UUID');
            $table->string('no_resi_ajuan', 20);
            $table->date('tanggal_permohonan');
            $table->string('harga_satuan', 20);
            $table->string('jumlah_satuan', 20);
            $table->string('total_harga', 20);
            $table->string('nominal_acc', 20);
            $table->string('keterangan_permohonan', 100);
            $table->string('terbilang', 50);
            $table->boolean('status_permohonan', 1);
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
        Schema::dropIfExists('tb_permohonan');
    }
};
