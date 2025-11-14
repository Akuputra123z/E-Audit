<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recommendations extends Model
{
    use HasFactory;

    protected $table = 'recommendations';

    protected $fillable = [
        'kode_rekom_id',
        'nama_kecamatan',
        'desa_id',
        'kode_temuan_audit_id',
        'status',
        'uraian_rekom',
        'nilai_rekom',
        'no_tindak_lanjut',
        'uraian_tindak_lanjut',
        'nilai_tindak_lanjut',
        'file_tindak_lanjut',
        'tanggapan',
    ];

    protected $casts = [
        'file_tindak_lanjut'   => 'array',
        'nilai_rekom'          => 'decimal:2',
        'nilai_tindak_lanjut'  => 'decimal:2',
    ];

    /**
     * RELASI: Kode Atribut Rekomendasi
     */
    public function kodeRekom()
    {
        return $this->belongsTo(KodeRekomendasi::class, 'kode_rekom_id');
    }

    /**
     * RELASI: Desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    /**
     * RELASI: Kode Temuan Audit
     */
    public function kodeTemuanAudit()
    {
        return $this->belongsTo(KodeTemuanAudit::class, 'kode_temuan_audit_id');
    }
}
