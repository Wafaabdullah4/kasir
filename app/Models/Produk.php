<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'produkid';

    protected $fillable = [
        'namaproduk',
        'harga',
        'stok'
    ];

    // Jika diperlukan, atur relasi ke tabel Detailpenjualan
    public function detailPenjualan()
    {
        return $this->hasMany(Detailpenjualan::class, 'produkid');
    }
}
