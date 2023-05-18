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
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 40)->primary()->comment('UUID');
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->string('password')->min(8);
            $table->string('no_hp', 13);
            $table->string('divisi',25);
            $table->string('jabatan',25);
            $table->string('alamat', 100);
            $table->boolean('is_active')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
