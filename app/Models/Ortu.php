<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $table = 'ortu';
    protected $fillable = [
        'skn_id',
        'status',
        'domisili',
        'nama',
        'bin',
        'ttl',
        'warganegara',
        'agama',
        'pekerjaan',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten'
    ];

    /**
     * Get the skn that owns the Ortu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skn()
    {
        return $this->belongsTo(User::class, 'skn_id');
    }
}
