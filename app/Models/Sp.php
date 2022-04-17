<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sp extends Model
{
    use HasFactory;
    protected $table = 'sp';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'tujuan',
        'perlu',
        'alamat',
        'sk_rtrw',
        'berlaku_mulai',
        'berlaku_sampai',
        'tgl_sk_rtrw',
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
