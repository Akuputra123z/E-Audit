<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'kode_atribut_rekomendasi';

    protected $fillable = [
        'sub_kelompok',
        'jenis',
        'deskripsi',
    ];

    public function recommendations()
    {
        return $this->hasMany(Recommendations::class, 'kode_rekom_id');
    }
}
