<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Supplier;
use App\Models\Pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    private $category_name = 'transaksi';
    private $page_name = "pembelian";

    public function create()
    {
        // dd($this->generateNoTransaksi());
        return view('pages.pembelian.create', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'suppliers' => Supplier::all(),
            'no_transaksi' => $this->generateNoTransaksi(),
            'obats' => Obat::all(),
        ]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        $total = 0;
        foreach ($request->obat_id as $key => $value) {
            $total += $request->harga_beli[$key] * $request->jumlah_beli[$key];
        }

        try {
            $pembelian = Pembelian::create([
                'no_pembelian' => $request->no_pembelian,
                'supplier_id' => $request->supplier,
                'user_id' => auth()->user()->id,
                'tanggal_beli' => $request->tanggal,
                'total' => $total
            ]);

            foreach ($request->obat_id as $key => $value) {
                DetailPembelian::create([
                    'pembelian_id' => $pembelian->id,
                    'obat_id' => $value,
                    'harga_beli' => $request->harga_beli[$key],
                    'jumlah_beli' => $request->jumlah_beli[$key],
                    'jumlah_sisa' => $request->jumlah_beli[$key],
                    'tanggal_expire' => $request->tanggal_expire[$key],
                ]);
            }

            foreach ($request->obat_id as $key => $value) {
                $obat = Obat::find($value);
                $obat->stok += $request->jumlah_beli[$key];
                $obat->save();
            }

            DB::commit();
            Alert::success('Berhasil', 'Pembelian Berhasil Disimpan');
            return redirect()->route('pembelian.create');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('pembelian.create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function generateNoTransaksi()
    {
        $last_pembelian = Pembelian::orderBy('created_at', 'desc')->first();
        if ($last_pembelian) {
            $last_no_transaksi = $last_pembelian->no_pembelian;
            $last_no_transaksi = explode('-', $last_no_transaksi);
            $last_no_transaksi = $last_no_transaksi[2];
            $last_no_transaksi = (int)$last_no_transaksi;
            $last_no_transaksi++;
            $last_no_transaksi = str_pad($last_no_transaksi, 4, '0', STR_PAD_LEFT);
            $no_transaksi = 'PBL-' . date('Ymd') . '-' . $last_no_transaksi;
        } else {
            $no_transaksi = 'PBL-' . date('Ymd') . '-0001';
        }
        return $no_transaksi;
    }
}
