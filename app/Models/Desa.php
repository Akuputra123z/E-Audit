<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    protected $fillable = [
        'nama_desa',
        'kode_desa',
        'nama_kecamatan',
    ];

    public function recommendations()
    {
        return $this->hasMany(Recommendations::class, 'desa_id');
        
    }
}
