<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $primaryKey = 'pelangganid';

    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'nomor_telepon'
    ];

    // Jika diperlukan, atur relasi ke tabel Penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'pelangganid');
    }
}
