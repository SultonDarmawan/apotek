<?php

// App\Http\Controllers\DashboardController.php
namespace App\Http\Controllers;

use App\Models\DetailJualBeli;
use Carbon\Carbon;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $category_name = 'dashboard';
    private $page_name = "dashboard";

    public function index()
    {
        // Pembelian Bulan ini
        $pembelian_bulan_ini = Pembelian::whereMonth('tanggal_beli', Carbon::now()->month)->get();
        $total_pembelian_bulan_ini = 0;
        foreach ($pembelian_bulan_ini as $pembelian) {
            $total_pembelian_bulan_ini += $pembelian->total;
        }

        // Penjualan Bulan ini
        $penjualan_bulan_ini = Penjualan::whereMonth('tanggal_jual', Carbon::now()->month)->get();
        $total_penjualan_bulan_ini = 0;
        foreach ($penjualan_bulan_ini as $penjualan) {
            $total_penjualan_bulan_ini += $penjualan->total;
        }

        // HPP dan Laba Bulan ini
        $detail_jual_beli = DetailJualBeli::join('detail_penjualans', 'detail_jual_belis.detail_penjualan_id', '=', 'detail_penjualans.id')
            ->join('detail_pembelians', 'detail_jual_belis.detail_pembelian_id', '=', 'detail_pembelians.id')
            ->join('penjualans', 'detail_penjualans.penjualan_id', '=', 'penjualans.id')
            ->whereMonth('tanggal_jual', Carbon::now()->month)
            ->get();

        $hpp = 0;
        foreach($detail_jual_beli as $jb) {
            $hpp += $jb->jumlah * $jb->harga_beli;
        }

        $laba = 0;
        foreach($detail_jual_beli as $jb) {
            $laba += ($jb->jumlah * $jb->harga_jual) - ($jb->jumlah * $jb->harga_beli);
        }

        // Data untuk notifikasi
        $expiredMedicines = Obat::expiredMedicines();
        $aboutToExpire = Obat::aboutToExpire();
        $outOfStock = Obat::outOfStock();

        // Hitung selisih tanggal expire dengan tanggal hari ini
        $sisa = [];
        foreach ($aboutToExpire as $key => $value) {
            $sisa[$key] = Carbon::parse($value->tanggal_expire)->diffInDays(Carbon::now());
        }

        // Obat terlaris berdasarkan jumlah jual
        $laris = DetailPenjualan::select(DB::raw('SUM(jumlah_jual) as jumlah, obat_id'))
                ->groupBy('obat_id')
                ->orderBy('jumlah', 'DESC')
                ->limit(5)
                ->get();
        

        return view('dashboard', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'total_pembelian_bulan_ini' => $total_pembelian_bulan_ini,
            'total_penjualan_bulan_ini' => $total_penjualan_bulan_ini,
            'hpp' => $hpp,
            'laba' => $laba,
            'goToExpire' => $aboutToExpire,
            'laris' => $laris,
            'sisa' => $sisa,
            'expiredMedicines' => $expiredMedicines,
            'outOfStock' => $outOfStock
        ]);
    }
}