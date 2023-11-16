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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event')->default('');
            $table->string('tanggal_event')->default('');
            $table->string('lokasi_event')->default('');
            $table->string('keterangan_event')->default('');
            $table->unsignedBigInteger('jenis_event_id');
            $table->unsignedInteger('penyelenggara_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
