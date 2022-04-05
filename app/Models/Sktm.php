<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    use HasFactory;

    protected $table = 'sktm';
    protected $fillable = [
        'nomer_surat',
        'pembuat',
        'tanggal_pembuatan',
        'nama_pengaju',
        'jenis_kelamin',
        'agama',
        'ttl',
        'nik',
        'ktp',
        'pekerjaan',
        'pendidikan',
        'status',
        'alamat',
        'keperluan',
        'keterangan',
        'filename',
        'id_kategori'
    ];
}
