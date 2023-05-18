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
        Schema::table('tb_pembayaran_kas', function (Blueprint $table) {
            $table->string('id', 40)->nullable()->after('id_pembayaran_kas');
            $table->foreign('id')->references('id')->on('users');
            $table->string('id_permohonan', 40)->nullable()->after('id');
            $table->foreign('id_permohonan')->references('id_permohonan')->on('tb_permohonan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_pembayaran_kas', function (Blueprint $table) {
            $table->dropForeign('tb_pembayaran_kas_id_foreign');
            $table->dropColumn('id');
            $table->dropForeign('tb_pembayaran_kas_id_permohonan_foreign');
            $table->dropColumn('id_permohonan');
        });
    }
};
