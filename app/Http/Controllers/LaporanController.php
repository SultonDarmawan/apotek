<?php

namespace App\Http\Controllers;

use App\Models\DetailJualBeli;
use App\Models\Obat;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use Auth;

class LaporanController extends Controller
{
    private $category_name = 'laporan';

    public function pembelian()
    {
        $page_name = 'laporan-pembelian';
        $pembelians = Pembelian::get();

        $total_pembelian = 0;
        foreach ($pembelians as $pembelian) {
            $total_pembelian += $pembelian->total;
        }


        return view('pages.laporan.pembelian.index', [
            'category_name' => $this->category_name,
            'page_name' => $page_name,
            'pembelians' => $pembelians,
        ]);
    }

    public function detail_pembelian($id)
    {
        $page_name = 'laporan-pembelian';
        $pembelian = Pembelian::find($id);
        $detail = DetailPembelian::where('pembelian_id', $id)->get();

        $total = [];
        foreach ($detail as $d) {
            $total[$d->obat_id] = $d->harga_beli * $d->jumlah_beli;
        }

        $total_pembelian = 0;
        foreach ($total as $t) {
            $total_pembelian += $t;
        }

        return view('pages.laporan.pembelian.show', [
            'category_name' => $this->category_name,
            'page_name' => $page_name,
            'pembelian' => $pembelian,
            'detail' => $detail,
            'total' => $total,
            'total_pembelian' => $total_pembelian,
        ]);
    }

    public function penjualan()
    {
        $page_name = 'laporan-penjualan';
        $penjualans = Penjualan::get();
        $detail = DetailPenjualan::all();

        $total = [];
        foreach ($penjualans as $penjualan) {
            $total[$penjualan->id] = 0;
            foreach ($detail as $d) {
                if ($penjualan->id == $d->penjualan_id) {
                    $total[$penjualan->id] += $d->harga_jual * $d->jumlah_jual;
                }
            }
        }

        $total_penjualan = 0;
        foreach ($total as $t) {
            $total_penjualan += $t;
        }

        return view('pages.laporan.penjualan.index', [
            'category_name' => $this->category_name,
            'page_name' => $page_name,
            'penjualans' => $penjualans,
        ]);
    }

    public function detail_penjualan($id)
    {
        $page_name = 'laporan-penjualan';
        $penjualan = Penjualan::find($id);
        $detail = DetailPenjualan::where('penjualan_id', $id)->get();

        $total = [];
        foreach ($detail as $d) {
            $total[$d->obat_id] = $d->harga_jual * $d->jumlah_jual;
        }

        $total_penjualan = 0;
        foreach ($total as $t) {
            $total_penjualan += $t;
        }

        return view('pages.laporan.penjualan.show', [
            'category_name' => $this->category_name,
            'page_name' => $page_name,
            'penjualan' => $penjualan,
            'detail' => $detail,
            'total' => $total,
            'total_penjualan' => $total_penjualan,
        ]);
    }

    public function stok_obat()
    {
        $page_name = 'stok-obat';
        $detail = DetailPembelian::get();

        return view('pages.laporan.stok-obat.index', [
            'category_name' => $this->category_name,
            'page_name' => $page_name,
            'detail' => $detail,
        ]);
    }

    public function laba()
    {
        $page_name = 'laba';
        $laba = DetailJualBeli::get();


        return view('pages.laporan.laba.index', [
            'category_name' => $this->category_name,
            'page_name' => $page_name,
            'laba' => $laba
        ]);
    }
}
