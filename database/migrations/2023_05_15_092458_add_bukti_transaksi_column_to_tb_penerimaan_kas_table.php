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
        Schema::table('tb_penerimaan_kas', function (Blueprint $table) {
            $table->string('bukti_transaksi')->after('tanggal_penerimaan_kas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_penerimaan_kas', function (Blueprint $table) {
            $table->dropColumn('bukti_transaksi');
        });
    }
};
