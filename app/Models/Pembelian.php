<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_pembelian()
    {
        return $this->hasMany(DetailPembelian::class);
    }

    public function getTotalHargaBeliAttribute()
    {
        $total = 0;
        foreach ($this->detail_pembelian as $detail) {
            $total += $detail->harga_beli * $detail->jumlah_beli;
        }
        return $total;
    }


}
