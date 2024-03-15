<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpenjualan extends Model
{
    use HasFactory;

    protected $table = 'detailpenjualan';

    protected $primaryKey = 'detailid';

    protected $fillable = [
        'penjualanid',
        'produkid',
        'jumlah_produk',
        'subtotal'
    ];

    // Atur relasi ke tabel Penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualanid');
    }

    // Atur relasi ke tabel Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produkid');
    }
}
