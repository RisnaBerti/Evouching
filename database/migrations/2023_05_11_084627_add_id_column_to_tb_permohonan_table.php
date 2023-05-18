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
            $table->string('id')->nullable()->after('id_permohonan');
            $table->foreign('id')->references('id')->on('users');
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
            $table->dropForeign('tb_permohonan_id_foreign');
            $table->dropColumn('id');
        });
    }
};
