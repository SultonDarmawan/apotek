<?php

namespace App\Http\Controllers;

use App\Models\DetailJualBeli;
use App\Models\Obat;
use App\Models\Penjualan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    private $category_name = 'transaksi';
    private $page_name = "penjualan";

    public function create()
    {
        return view('pages.penjualan.create', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'no_transaksi' => $this->generateNoTransaksi(),
            'obats' => Obat::all(),
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $rupiah = Str::replaceFirst('Rp', '', $request->bayar);
        $bayar= Str::replace('.', '', $rupiah);

        $total = 0;
        foreach ($request->obat_id as $key => $value) {
            $total += $request->harga[$key] * $request->jumlah[$key];
        }
        try {
            // insert table penjualan
            $penjualan = Penjualan::create([
                'no_penjualan' => $request->no_penjualan,
                'user_id' => auth()->user()->id,
                'tanggal_jual' => $request->tanggal,
                'bayar' => (int)$bayar,
                'total' => $total
            ]);

            // insert table detail penjualan
            foreach ($request->obat_id as $key => $value) {
                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'obat_id' => $value,
                    'harga_jual' => $request->harga[$key],
                    'jumlah_jual' => $request->jumlah[$key],
                ]);
            }

            // update stock obat
            foreach ($request->obat_id as $key => $value) {
                $obat = Obat::find($value);
                $obat->stok -= $request->jumlah[$key];
                $obat->save();
            }

            // update jumlah_sisa detail penjualan
            foreach ($request->obat_id as $key => $value) {
                $detail_penjualan = DetailPenjualan::where('obat_id', $value)->get();
                $query = DetailPembelian::where('obat_id', $value)
                    ->where('jumlah_sisa', '>', 0)
                    ->where('tanggal_expire','>', date('Y-m-d'))
                    ->orderBy('tanggal_expire', 'asc');
                $stok_all = $query->sum('jumlah_sisa');
                $detail_pembelian = $query->get();
                $jumlah = $request->jumlah[$key];
                // cek jumlah obat yang dibeli dengan stok yang ada
                if($jumlah <= $stok_all) {
                    $penjualan_id = [];
                    foreach($detail_penjualan as $penjualan) {
                        $penjualan_id = $penjualan->id;
                    }
                    // Perulangan pada setiap list stok obat
                    foreach($detail_pembelian as $detail) {
                        $stok = $detail->jumlah_sisa;
                        // Selama $jumlah > 0 (belum habis), stok pada obat akan terus dikurangi
                        if($jumlah > 0) {
                            // variabel tmp sebagai pengurang ketika list pertama stok mencukupi
                            $tmp = $jumlah;
                            // proses pengurangan
                            $jumlah -= $stok;
                            // Jika hasil pengurangan lebih dari 0, artinya stok list pertama tidak mencukupi
                            if($jumlah > 0) {
                                // jika tidak mencukupi, update stok menjadi 0
                                $stok_update = 0;
                                $beli = $detail->jumlah_sisa;
                            } else {
                                // jika mencukupi, lakukan pengurangan stok dengan jumlah yang dibeli
                                $stok_update = $stok-$tmp;
                                $beli = $tmp;
                            }
                            $detail->jumlah_sisa = $stok_update;
                            $detail->save();

                            DetailJualBeli::create([
                                'detail_penjualan_id' => $penjualan_id,
                                'detail_pembelian_id' => $detail->id,
                                'jumlah' => $beli,
                            ]);
                        }
                    }
                } else {
                    Alert::warning('Gagal', 'Stok tidak cukup');
                    DB::rollback();
                    return redirect()->route('penjualan.create');
                }
            }

            DB::commit();
            Alert::success('Berhasil', 'Penjualan berhasil disimpan');
            return redirect()->route('penjualan.create');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Gagal', 'Penjualan gagal disimpan');
            return redirect()->route('penjualan.create');
        }
    }

    public function generateNoTransaksi()
    {
        $last_penjualan = Penjualan::orderBy('created_at', 'desc')->first();
        if ($last_penjualan) {
            $last_no_transaksi = $last_penjualan->no_penjualan;
            $last_no_transaksi = explode('-', $last_no_transaksi);
            $last_no_transaksi = $last_no_transaksi[2];
            $last_no_transaksi = (int)$last_no_transaksi;
            $last_no_transaksi++;
            $last_no_transaksi = str_pad($last_no_transaksi, 4, '0', STR_PAD_LEFT);
            $no_transaksi = 'PJL-' . date('Ymd') . '-' . $last_no_transaksi;
        } else {
            $no_transaksi = 'PJL-' . date('Ymd') . '-0001';
        }
        return $no_transaksi;
    }
}
