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
        Schema::table('tb_detail_permohonan', function (Blueprint $table) {
            $table->string('id_permohonan', 40)->nullable()->after('id_detail_permohonan');
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
        Schema::table('tb_detail_permohonan', function (Blueprint $table) {
            $table->dropForeign('tb_detail_permohonan_id_permohonan_foreign');
            $table->dropColumn('id_permohonan');
        });
    }
};