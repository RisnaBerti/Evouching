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
        Schema::table('tb_pembayaran_antar_bank', function (Blueprint $table) {
            $table->string('bulan', 3)->after('sisa_saldo');
            $table->string('tahun', 5)->after('bulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_pembayaran_antar_bank', function (Blueprint $table) {
            $table->dropColumn('bulan');
            $table->dropColumn('tahun');
        });
    }
};
