@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }

    .neumorphic-box {
        background: #e0e5ec;
        border-radius: 20px;
        box-shadow: 9px 9px 16px #a3b1c6, -9px -9px 16px #ffffff;
        padding: 30px;
        transition: 0.3s ease;
    }

    .neumorphic-box:hover {
        box-shadow: inset 7px 7px 14px #a3b1c6, inset -7px -7px 14px #ffffff;
    }

    label {
        font-weight: 500;
        color: #444;
        margin-bottom: 6px;
    }

    .neumorphic-input {
        background: #e0e5ec;
        border: none;
        border-radius: 10px;
        box-shadow: inset 4px 4px 8px #a3b1c6, inset -4px -4px 8px #ffffff;
        padding: 12px;
        width: 100%;
        color: #333;
        margin-bottom: 20px;
    }

    .neumorphic-input:focus {
        outline: none;
        box-shadow: inset 2px 2px 4px #a3b1c6, inset -2px -2px 4px #ffffff;
    }

    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        padding: 10px 24px;
        color: #444;
        font-weight: bold;
        box-shadow: 6px 6px 12px #a3b1c6, -6px -6px 12px #ffffff;
        transition: all 0.3s ease-in-out;
    }

    .neumorphic-btn:hover {
        box-shadow: inset 6px 6px 12px #a3b1c6, inset -6px -6px 12px #ffffff;
        transform: scale(1.03);
    }

    .text-danger {
        font-size: 13px;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <h4 class="mb-4">Tambah Pengguna</h4>
                <form action="{{ route('pengguna.store') }}" method="POST">
                    @csrf

                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="neumorphic-input @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="no_telp">No. Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" class="neumorphic-input @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}" required>
                    @error('no_telp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="neumorphic-input @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="neumorphic-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="level">Level</label>
                    <select name="level" id="level" class="neumorphic-input @error('level') is-invalid @enderror" required>
                        <option value="">Pilih Level</option>
                        <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('level')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="neumorphic-input @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="neumorphic-btn mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
