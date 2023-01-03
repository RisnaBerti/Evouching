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
        Schema::create('pembayaranbank', function (Blueprint $table) {
            $table->id('id_pembayaranbank');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pengajuan');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan');
            $table->string('no_resi_pembayaranbank', 25);
            $table->string('tanggal_pembayaranbank', 20);
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
        Schema::table('pembayaranbank', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
            $table->dropForeign(['id_pengajuan']);
            $table->dropColumn('id_pengajuan');
        });
        Schema::dropIfExists('pembayaranbank');
    }
};