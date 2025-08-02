<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private $category_name = 'pengguna';
    private $page_name = 'pengguna';

    public function index()
    {
        $pengguna = User::all();
        return view('pages.pengguna.index', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'pengguna' => $pengguna,
        ]);
    }

    public function create()
    {
        return view('pages.pengguna.create', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'pengguna' => new User,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_telp' => 'required|alpha_num',
            'alamat' => 'required',
            'level' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
        Alert::toast('User '. $request->nama .' Berhasil ditambahkan','success');
        return redirect()->route('pengguna.index');
    }

    public function edit(User $pengguna)
    {
        return view('pages.pengguna.edit', [
            'category_name' => $this->category_name,
            'page_name' => $this->page_name,
            'pengguna' => $pengguna,
        ]);
    }

    public function update(Request $request, User $pengguna)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_telp' => 'required|alpha_num',
            'alamat' => 'required',
            'level' => 'required',
            'email' => 'required|email|unique:users,email,' . $pengguna->id,
        ]);
        if ($request->password == '') {
            unset($request['password']);
        } else {
            $request['password'] = bcrypt($request->password);
        }
        $pengguna->update($request->all());
        Alert::toast('Data Pengguna Berhasil diedit','success');
        return redirect()->route('pengguna.index');
    }

    public function destroy(User $pengguna)
    {
        try {
            $pengguna->delete();
            Alert::toast('Pengguna '. $pengguna->nama .' Berhasil dihapus','success');
            return redirect()->route('pengguna.index');
        } catch (\Exception $e) {
            Alert::toast('Pengguna '. $pengguna->nama .' Gagal dihapus','error');
            return redirect()->route('pengguna.index');
        }
    }
}
