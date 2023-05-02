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
            $table->id('id_permohonan');
            $table->string('no_resi_permohonan', 25);
            $table->string('tanggal_permohonan', 20);
            $table->string('nama_perkiraan', 30);
            $table->string('harga_satuan', 20);
            $table->string('jumlah_satuan', 4);
            $table->string('total_harga', 20);
            $table->string('nominal_acc', 20);
            $table->text('keterangan_permohonan');
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
        Schema::table('tb_permohonan', function (Blueprint $table) {
            $table->dropForeign('id_user');
        });
    }
};
