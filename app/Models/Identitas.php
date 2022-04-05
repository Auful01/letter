<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    use HasFactory;

    protected $table = 'identitas';
    protected $fillable = [
        'nik',
        'nkk',
        'nama',
        'ttl',
        'agama',
        'kelamin',
        'status_kawin',
        'pekerjaan',
        'pendidikan',
        'kategori_id',
        'nomer_surat'
    ];

    /**
     * Get the kategori that owns the Identitas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
