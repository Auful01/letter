<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    protected $fillable = [
        'identitas_id',
        'domisili',
        'nama',
        'telepon',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'nomor_surat',
        'nama_usaha',
        'bidang',
        'modal',
        'sarana',
        'alamat_usaha',
        'kelurahan_usaha',
        'kecamatan_usaha',
        'ttd'
    ];

    /**
     * Get the identitas that owns the Umkm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'identitas_id');
    }
}
