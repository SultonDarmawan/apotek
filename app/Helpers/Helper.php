<?php

namespace App\Helpers;

use App\Models\DetailPembelian;

class Helper
{
    public static function expired()
    {
        $expired = DetailPembelian::where('tanggal_expire', '<=', date('Y-m-d'))
        ->where('jumlah_sisa', '>', 0)
        ->count();

        return $expired;
    }
}
