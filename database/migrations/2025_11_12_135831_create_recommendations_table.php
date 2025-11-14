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

            // Relasi ke kode atribut rekomendasi
            $table->foreignId('kode_rekom_id')
                ->nullable()
                ->constrained('kode_atribut_rekomendasi')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            // Relasi ke desa
            $table->foreignId('desa_id')
                ->nullable()
                ->constrained('desa') // pastikan nama tabel benar
                ->cascadeOnUpdate()
                ->nullOnDelete();

            // Relasi ke kode temuan audit
            $table->foreignId('kode_temuan_audit_id')
                ->nullable()
                ->constrained('kode_atribut_temuan_audit') // cek nama tabel
                ->cascadeOnUpdate()
                ->nullOnDelete();

            // Status rekomendasi
            $table->string('status')->nullable();

            // Data rekomendasi
            $table->text('uraian_rekom')->nullable();
            $table->decimal('nilai_rekom', 18, 2)->nullable();

            // Tindak lanjut
            $table->string('no_tindak_lanjut')->nullable();
            $table->text('uraian_tindak_lanjut')->nullable();
            $table->decimal('nilai_tindak_lanjut', 18, 2)->nullable();

            // Multi-file penyimpanan
            $table->json('file_tindak_lanjut')->nullable();

            // Tanggapan tambahan
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
