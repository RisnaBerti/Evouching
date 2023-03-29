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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id('id_permohonan')->autoIncrement()->primary();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('no_resi_permohonan');
            $table->date('tanggal_permohonan');
            $table->string('nama_perkiraan', 50);
            $table->bigInteger('harga_satuan', 13);
            $table->bigInteger('jumlah_satuan',10);
            $table->bigInteger('total_harga',20);
            $table->bigInteger('nominal_acc',20);
            $table->string('keterangan_permohonan', 50);
            $table->string('status_permohonan');
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
        Schema::dropIfExists('permohonan');
        Schema::dropForeign('id_user');
    }
};
