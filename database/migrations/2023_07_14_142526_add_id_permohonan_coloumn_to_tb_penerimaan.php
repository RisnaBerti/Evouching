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
        Schema::table('tb_penerimaan', function (Blueprint $table) {
            $table->string('id_permohonan', 40)->after('id_penerimaan');
            $table->foreign('id_penerimaan')->references('id_permohonan')->on('tb_permohonan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_penerimaan', function (Blueprint $table) {
            $table->dropForeign(['id_permohonan']);
            $table->dropColumn('id_permohonan');
        });
    }
};
