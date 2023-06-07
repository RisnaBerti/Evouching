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
        Schema::table('tb_permohonan', function (Blueprint $table) {
            $table->string('ttd_pemohon', 40)->nullable()->after('terbilang');
            $table->string('ttd_manajer', 40)->nullable()->after('ttd_pemohon');
            $table->string('ttd_pemeriksa', 40)->nullable()->after('ttd_manajer');
            $table->string('ttd_bendahara', 40)->nullable()->after('ttd_pemeriksa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_permohonan', function (Blueprint $table) {
            $table->dropColumn('ttd_pemohon');
            $table->dropColumn('ttd_manajer');
            $table->dropColumn('ttd_pemeriksa');
            $table->dropColumn('ttd_bendahara');
        });
    }
};
