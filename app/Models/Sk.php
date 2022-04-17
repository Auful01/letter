<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use HasFactory;
    protected $table = 'sk';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'alamat',
        'tujuan',
        'uraian',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'nama_kuasa',
        'ttl_kuasa',
        'kelamin_kuasa',
        'domisili_kuasa',
        'pekerjaan_kuasa',
        'alamat_kuasa',
        'desa_kuasa',
        'kecamatan_kuasa',
        'kabupaten_kuasa',
        'ttd'
    ];

    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'identitas_id');
    }
}
