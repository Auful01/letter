<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skck extends Model
{
    use HasFactory;
    protected $table = 'skck';
    protected $fillable = [
        'identitas_id',
        'nomor_surat',
        'tujuan',
        'perlu',
        'alamat',
        'sk_rtrw',
        'berlaku_mulai',
        'berlaku_sampai',
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
