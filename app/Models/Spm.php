<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spm extends Model
{
    use HasFactory;

    protected $table = 'spm';
    protected $fillable = [
        'identitas_id',
        'kelurahan',
        'domisili',
        'kecamatan',
        'kabupaten',
        'nomor_surat',
        'nama_mati',
        'tgl_mati',
        'ttd'
    ];

    /**
     * Get the user that owns the Spm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'identitas_id');
    }
}
