<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skdu extends Model
{
    use HasFactory;
    protected $table = 'skdu';
    protected $fillable = [
        'identitas_id',
        'domisili',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'nomor_surat',
        'tanggal_surat',
        'sk_rtrw',
        'perlu',
        'nama_usaha',
        'alamat_usaha',
        'bidang',
        'rtrw',
        'ttd'
    ];

    /**
     * Get the identitas that owns the Skdu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'identitas_id');
    }
}
