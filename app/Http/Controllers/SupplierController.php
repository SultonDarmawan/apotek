<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    private $category_name = 'master data';
    private $page_name = 'supplier';

    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.master.supplier.index', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'suppliers' => $suppliers,
        ]);
    }

    public function create()
    {
        return view('pages.master.supplier.create', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'supplier' => new Supplier,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_supplier' => 'required|unique:suppliers',
            'no_telp' => 'required|alpha_num',
            'alamat' => 'required',
        ]);

        Supplier::create($request->all());
        Alert::toast('Supplier '. $request->nama_supplier .' Berhasil ditambahkan','success');
        return redirect()->route('supplier.index');
    }

    public function edit(Supplier $supplier)
    {
        return view('pages.master.supplier.edit', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'supplier' => $supplier,
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'nama_supplier' => 'required',
            'no_telp' => 'required|alpha_num',
            'alamat' => 'required',
        ]);

        $supplier->update($request->all());
        Alert::toast('Data Supplier Berhasil diubah','success');

        return redirect()->route('supplier.index');
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
            Alert::toast('Supplier '. $supplier->nama_supplier .' Berhasil dihapus','success');
            return redirect()->route('supplier.index');
        } catch (\Exception $e) {
            Alert::toast('Supplier '. $supplier->nama_supplier .' Gagal dihapus','error');
            return redirect()->route('supplier.index');
        }
    }
}
