<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('namaPerusahaan');
            $table->string('alamatToko');
            $table->string('alamatGudang');
            $table->longText('deskripsiPerusahaan');
            $table->string('logoPerusahaan');
            $table->string('GambarPerusahaan1')->nullable();
            $table->string('GambarPerusahaan2')->nullable();
            $table->string('GambarPerusahaan3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
