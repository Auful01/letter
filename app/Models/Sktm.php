<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    use HasFactory;

    protected $table = 'sktm';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'perlu',
        'berlaku_dari',
        'berlaku_sampai',
        'tujuan',
        'sk_rtrw',
        'ttd'
    ];

    /**
     * Get the identitas that owns the Sktm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function identitas()
    {
        return $this->belongsTo(Identitas::class, 'identitas_id');
    }
}
