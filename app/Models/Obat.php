<?php

// App\Models\Obat.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class);
    }

    // Method untuk mengecek stok habis
    public function isOutOfStock()
    {
        return $this->stok <= 0;
    }

    // Method untuk mendapatkan obat yang sudah kadaluarsa
    public static function expiredMedicines()
    {
        return DetailPembelian::where('tanggal_expire', '<=', now())
            ->where('jumlah_sisa', '>', 0)
            ->with('obat')
            ->get();
    }

    // Method untuk mendapatkan obat yang hampir kadaluarsa (30 hari)
    public static function aboutToExpire()
    {
        return DetailPembelian::where('tanggal_expire', '>', now())
            ->where('tanggal_expire', '<=', now()->addDays(30))
            ->where('jumlah_sisa', '>', 0)
            ->with('obat')
            ->get();
    }

    // Method untuk mendapatkan obat yang stoknya habis
    public static function outOfStock()
    {
        return self::where('stok', '<=', 0)->get();
    }
}
