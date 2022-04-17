<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpm extends Model
{
    use HasFactory;
    protected $table = 'skpm';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'sk_rtrw',
        'perlu',
        'berlaku_dari',
        'berlaku_sampai',
        'alamat_asal',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'tgl_pindah',
        'alamat_pindah',
        'ttd'
    ];

    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'identitas_id');
    }
}
