<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpn extends Model
{
    use HasFactory;
    protected $table = 'skpn';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'tujuan',
        'perlu',
        'alamat_tujuan',
        'sk_rtrw',
        'desa',
        'kecamatan',
        // 'kebangsaan',
        'kabupaten',
        'provinsi',
        'tgl_nikah',
        'ttd'
    ];


    /**
     * Get the identitas that owns the Skbm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'identitas_id');
    }
}
