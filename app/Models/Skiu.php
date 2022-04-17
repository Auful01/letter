<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skiu extends Model
{
    use HasFactory;
    protected $table = 'skiu';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'tujuan',
        'perlu',
        'alamat',
        'sk_rtrw',
        'berlaku_mulai',
        'berlaku_sampai',
        'nama_usaha',
        'alamat_usaha',
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
