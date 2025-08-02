<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJualBeli extends Model
{
    use HasFactory;

    protected $guarded = [];

    // belongs to detail_penjualan
    public function detail_penjualan()
    {
        return $this->belongsTo(DetailPenjualan::class, 'detail_penjualan_id');
    }

    // belongs to detail_pembelian
    public function detail_pembelian()
    {
        return $this->belongsTo(DetailPembelian::class, 'detail_pembelian_id');
    }
}
