<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ObatController extends Controller
{
    private $category_name = 'master data';
    private $page_name = "obat";

    public function index()
    {
        $obats = Obat::all();
        return view('pages.master.obat.index', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'obats' => $obats,
        ]);
    }

    public function create()
    {
        return view('pages.master.obat.create', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'obat' => new Obat,
            'kategoris' => Kategori::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_obat' => 'required|unique:obats',
            'kategori_id' => 'required',
            'harga_beli' => 'required|alpha_num',
            'harga_jual' => 'required|alpha_num',
        ]);

        Obat::create($request->all());
        Alert::toast('Obat '. $request->nama_obat .' Berhasil ditambahkan','success');
        return redirect()->route('obat.index');
    }

    public function edit(Obat $obat)
    {
        return view('pages.master.obat.edit', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'obat' => $obat,
            'kategoris' => Kategori::all(),
        ]);
    }

    public function update(Request $request, Obat $obat)
    {
        $this->validate($request, [
            'nama_obat' => 'required',
            'kategori_id' => 'required',
            'harga_beli' => 'required|alpha_num',
            'harga_jual' => 'required|alpha_num',
        ]);

        $obat->update($request->all());
        Alert::toast('Data Obat Berhasil diedit','success');
        return redirect()->route('obat.index');
    }

    public function destroy(Obat $obat)
    {
        try {
            $obat->delete();
            Alert::toast('Obat '. $obat->nama_obat .' Berhasil dihapus','success');
            return redirect()->route('obat.index');
        } catch (\Exception $e) {
            Alert::toast('Obat '. $obat->nama_obat .' Gagal dihapus','error');
            return redirect()->route('obat.index');
        }
    }

    public function expired()
    {
        $expired = DetailPembelian::where('tanggal_expire', '<=', date('Y-m-d'))
                ->where('jumlah_sisa', '>', 0)
                ->get();
        return view('pages.obat-expired.index', [
            'category_name' => 'obat-expired',
            'page_name' => 'obat-expired',
            'expired' => $expired,
        ]);
    }

    public function hapus_expired($id)
    {
        DB::beginTransaction();
        $expired = DetailPembelian::find($id);
        try {
            // Kurangi stok obat sesuai jumlah obat yang expired
            $obat = Obat::find($expired->obat_id);
            $obat->update(['stok' => $obat->stok - $expired->jumlah_sisa]);

            // update jumlah_sisa di detail_pembelian menjadi 0
            $expired->update(['jumlah_sisa' => 0]);

            DB::commit();
            Alert::toast('Stok Obat '. $expired->obat->nama_obat .' Berhasil dihapus','success');
            return redirect()->route('obat-expired');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::toast('Stok Obat '. $expired->obat->nama_obat .' Gagal dihapus','error');
            return redirect()->route('obat-expired');
        }
    }
}
