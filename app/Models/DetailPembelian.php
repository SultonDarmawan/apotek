<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
