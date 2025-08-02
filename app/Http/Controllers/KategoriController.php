<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class KategoriController extends Controller
{
    private $category_name = 'master data';
    private $page_name = "kategori";

    public function index()
    {
        $kategories = Kategori::all();
        return view('pages.master.kategori.index', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'kategories' => $kategories,
        ]);
    }

    public function create()
    {
        return view('pages.master.kategori.create', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'kategori' => new Kategori
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|unique:kategoris',
        ]);

        Kategori::create($request->all());
        Alert::toast('Kategori '. $request->nama_kategori .' Berhasil ditambahkan','success');
        return redirect()->route('kategori.index');
    }

    public function edit(Kategori $kategori)
    {
        return view('pages.master.kategori.edit', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|unique:kategoris',
        ]);

        $kategori->update($request->all());
        Alert::toast('Data Kategori Berhasil diedit','success');
        return redirect()->route('kategori.index');
    }

    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            Alert::toast('Kategori '. $kategori->nama_kategori .' Berhasil dihapus','success');
            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            Alert::toast('Kategori '. $kategori->nama_kategori .' Gagal dihapus','error');
            return redirect()->route('kategori.index');
        }
    }
}
