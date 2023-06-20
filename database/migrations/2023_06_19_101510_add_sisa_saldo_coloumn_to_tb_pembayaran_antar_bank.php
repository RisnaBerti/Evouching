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
            $table->string('sisa_saldo', 40)->after('total_dana'); 
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
            $table->dropColumn('sisa_saldo');
        });
    }
};
