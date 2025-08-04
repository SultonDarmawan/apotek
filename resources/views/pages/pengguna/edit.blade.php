@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }

    .neumorphic-box {
        background: #e0e5ec;
        border-radius: 20px;
        padding: 30px;
        box-shadow:
            9px 9px 16px #a3b1c6,
            -9px -9px 16px #ffffff;
        transition: box-shadow 0.3s ease;
    }

    .neumorphic-box:hover {
        box-shadow:
            inset 7px 7px 15px #a3b1c6,
            inset -7px -7px 15px #ffffff;
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
        color: #444;
    }

    .neumorphic-input {
        background: #e0e5ec;
        border: none;
        border-radius: 10px;
        padding: 12px 16px;
        width: 100%;
        box-shadow:
            inset 4px 4px 8px #a3b1c6,
            inset -4px -4px 8px #ffffff;
        color: #333;
        margin-bottom: 18px;
    }

    .neumorphic-input:focus {
        outline: none;
        box-shadow:
            inset 2px 2px 4px #a3b1c6,
            inset -2px -2px 4px #ffffff;
    }

    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        box-shadow:
            6px 6px 10px #a3b1c6,
            -6px -6px 10px #ffffff;
        padding: 10px 24px;
        color: #444;
        font-weight: bold;
        transition: all 0.2s ease-in-out;
    }

    .neumorphic-btn:hover {
        box-shadow:
            inset 6px 6px 10px #a3b1c6,
            inset -6px -6px 10px #ffffff;
        transform: scale(1.02);
        color: #222;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <h4 class="mb-4">Edit Profil</h4>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="neumorphic-input @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $pengguna->nama) }}" required>

                            <label for="no_telp">No. Telepon</label>
                            <input type="text" name="no_telp" class="neumorphic-input @error('no_telp') is-invalid @enderror"
                                value="{{ old('no_telp', $pengguna->no_telp) }}" required>

                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="neumorphic-input @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat', $pengguna->alamat) }}" required>

                            <label for="level">Level</label>
                            <select name="level" class="neumorphic-input @error('level') is-invalid @enderror">
                                <option value="admin" {{ $pengguna->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $pengguna->level == 'user' ? 'selected' : '' }}>User</option>
                            </select>

                            <label for="email">Email</label>
                            <input type="email" name="email" class="neumorphic-input @error('email') is-invalid @enderror"
                                value="{{ old('email', $pengguna->email) }}" required>

                            <label for="password">Password (Biarkan kosong jika tidak diubah)</label>
                            <input type="password" name="password" class="neumorphic-input @error('password') is-invalid @enderror">

                            <button type="submit" class="neumorphic-btn mt-3">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
