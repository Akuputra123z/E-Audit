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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();

            /**
             * KODE REKOMENDASI
             */
            $table->foreignId('kode_rekom_id')
                ->nullable()
                ->constrained('kode_atribut_rekomendasi')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            /**
             * KECAMATAN (dipilih dulu di Form)
             * DISIMPAN sebagai teks
             */
            $table->string('nama_kecamatan')->nullable();

            /**
             * DESA (filtered by kecamatan)
             */
            $table->foreignId('desa_id')
                ->nullable()
                ->constrained('desa') 
                ->cascadeOnUpdate()
                ->nullOnDelete();

            /**
             * KODE TEMUAN AUDIT
             */
            $table->foreignId('kode_temuan_audit_id')
                ->nullable()
                ->constrained('kode_atribut_temuan_audit')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            /**
             * STATUS
             */
            $table->string('status')->nullable();

            /**
             * DATA REKOMENDASI
             */
            $table->text('uraian_rekom')->nullable();
            $table->decimal('nilai_rekom', 18, 2)->nullable();

            /**
             * TINDAK LANJUT
             */
            $table->string('no_tindak_lanjut')->nullable();
            $table->text('uraian_tindak_lanjut')->nullable();
            $table->decimal('nilai_tindak_lanjut', 18, 2)->nullable();

            /**
             * MULTI-FILE PDF/GAMBAR
             * Berisi array json
             */
            $table->json('file_tindak_lanjut')->nullable();

            /**
             * TANGGAPAN
             */
            $table->text('tanggapan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
