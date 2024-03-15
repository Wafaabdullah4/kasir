<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $primaryKey = 'penjualanid';

    protected $fillable = [
        'tanggal_penjualan',
        'total_harga',
        'pelangganid'
    ];

    // Jika diperlukan, atur relasi ke tabel Detailpenjualan
    public function detailPenjualan()
    {
        return $this->hasMany(Detailpenjualan::class, 'penjualanid');
    }

    // Atur relasi ke tabel Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelangganid');
    }
}
