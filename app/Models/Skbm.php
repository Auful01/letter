<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skbm extends Model
{
    use HasFactory;

    protected $table = 'skbm';
    protected $fillable = [
        'identitas_id',
        'nomer_surat',
        'tujuan',
        'perlu',
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
