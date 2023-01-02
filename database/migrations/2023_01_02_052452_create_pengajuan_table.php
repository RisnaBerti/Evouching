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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->string('no_resi_pengajuan', 25);
            $table->string('tanggal_pengajuan', 20);
            $table->string('nama_perkiraan', 30);
            $table->string('harga_satuan', 20);
            $table->string('jumlah_satuan', 4);
            $table->string('total_harga', 20);
            $table->string('nominal_acc', 20);
            $table->text('keterangan_pengajuan');
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
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
        Schema::dropIfExists('pengajuan');
    }
};
