<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeTemuanAudit extends Model
{
    use HasFactory;

    protected $table = 'kode_atribut_temuan_audit';

    protected $fillable = [
        'sub_kelompok',
        'jenis',
        'deskripsi',
    ];

    // Tambahkan relasi balik (optional tapi bagus untuk Filament)
    public function recommendations()
    {
        return $this->hasMany(Recommendations::class, 'kode_temuan_audit_id');
    }
}
