<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skik extends Model
{
    use HasFactory;
    protected $table = 'skik';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'tujuan',
        'perlu',
        'alamat',
        'sk_rtrw',
        'berlaku_mulai',
        'berlaku_sampai',
        'nama_acara',
        'tanggal_acara',
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
