<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'no_surat',
        'perihal',
        'tgl_surat',
        'tgl_menerima',
        'sifat_surat',
        'asal_instansi',
        'file_surat'
    ];

    /**
     * Get the user tha the Surat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
