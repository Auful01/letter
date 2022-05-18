<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skn extends Model
{
    use HasFactory;

    protected $table = 'skn';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'nik',
        'nama',
        'kelamin',
        'ttl',
        'agama',
        'pekerjaan',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'bin',
        'nik_pasangan',
        'nama_pasangan',
        'kelamin_pasangan',
        'ttl_pasangan',
        'agama_pasangan',
        'pekerjaan_pasangan',
        'alamat_pasangan',
        'desa_pasangan',
        'kecamatan_pasangan',
        'kabupaten_pasangan',
        'bin_pasangan',
        'status_kawin_pasangan',
        'pasangan_sebelum',
        'ttd'
    ];

    /**
     * Get the identitas that owns the Skn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'foreign_key', 'other_key');
    }
}
