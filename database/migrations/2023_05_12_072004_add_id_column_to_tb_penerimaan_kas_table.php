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
            $table->string('id')->nullable()->after('id_penerimaan_kas');
            $table->foreign('id')->references('id')->on('users');
            $table->string('id_permohonan')->nullable()->after('id');
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
        Schema::table('tb_penerimaan_kas', function (Blueprint $table) {
            $table->dropForeign('tb_penerimaan_kas_id_foreign');
            $table->dropColumn('id');
            $table->dropForeign('tb_penerimaan_kas_id_permohonan_foreign');
            $table->dropColumn('id_permohonan');
        });
    }
};
