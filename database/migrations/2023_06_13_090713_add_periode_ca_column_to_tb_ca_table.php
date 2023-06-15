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
        Schema::table('tb_ca', function (Blueprint $table) {
            $table->string('periode_ca', 40)->nullable()->after('tanggal_penerimaan_ca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_ca', function (Blueprint $table) {
            $table->dropColumn('periode_ca');
        });
    }
};
