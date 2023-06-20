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
        Schema::table('tb_saldo', function (Blueprint $table) {
            $table->string('id_pembayaran_antar_bank', 40)->after('id_saldo');
            $table->foreign('id_pembayaran_antar_bank')->references('id_pembayaran_antar_bank')->on('tb_pembayaran_antar_bank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_saldo', function (Blueprint $table) {
            $table->dropForeign(['id_pembayaran_antar_bank']);
            $table->dropColumn('id_pembayaran_antar_bank');
        });
    }
};
