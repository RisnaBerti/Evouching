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
        Schema::create('tb_detail_permohonan', function (Blueprint $table) {
            $table->id('id_detail_permohonan')->primary();
            $table->string('nama_barang', 50);
            $table->string('qty', 5);
            $table->string('harga_satuan', 10);
            $table->string('total', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detail_permohonan');
    }
};
