@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }

    .neumorphic-box {
        background: #e0e5ec;
        border-radius: 15px;
        box-shadow:
          8px 8px 15px #a3b1c6,
          -8px -8px 15px #ffffff;
        padding: 30px;
        transition: box-shadow 0.3s ease;
        margin-bottom: 30px;
    }

    .neumorphic-box:hover {
        box-shadow:
          4px 4px 8px #a3b1c6,
          -4px -4px 8px #ffffff;
    }

    .neumorphic-input {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: none;
        border-radius: 12px;
        background: #e0e5ec;
        box-shadow:
          inset 6px 6px 8px #a3b1c6,
          inset -6px -6px 8px #ffffff;
        font-size: 16px;
        color: #555;
        transition: box-shadow 0.3s ease;
    }

    .neumorphic-input:focus {
        outline: none;
        box-shadow:
          inset 3px 3px 5px #a3b1c6,
          inset -3px -3px 5px #ffffff;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #555;
    }

    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 15px;
        padding: 12px 30px;
        font-weight: 700;
        color: #555;
        cursor: pointer;
        box-shadow:
          6px 6px 8px #a3b1c6,
          -6px -6px 8px #ffffff;
        transition: all 0.3s ease;
    }

    .neumorphic-btn:hover {
        box-shadow:
          inset 6px 6px 8px #a3b1c6,
          inset -6px -6px 8px #ffffff;
        transform: scale(1.05);
    }

    .text-danger {
        font-size: 14px;
        margin-top: -12px;
        margin-bottom: 10px;
        color: #e74c3c;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <h4 class="mb-4">Edit Obat</h4>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="nama_obat">Nama Obat</label>
                            <input
                                type="text"
                                id="nama_obat"
                                name="nama_obat"
                                class="neumorphic-input @error('nama_obat') is-invalid @enderror"
                                value="{{ old('nama_obat', $obat->nama_obat) }}"
                                required
                            >
                            @error('nama_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label for="harga_beli">Harga Beli</label>
                            <input
                                type="number"
                                id="harga_beli"
                                name="harga_beli"
                                class="neumorphic-input @error('harga_beli') is-invalid @enderror"
                                value="{{ old('harga_beli', $obat->harga_beli) }}"
                                required
                            >
                            @error('harga_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label for="harga_jual">Harga Jual</label>
                            <input
                                type="number"
                                id="harga_jual"
                                name="harga_jual"
                                class="neumorphic-input @error('harga_jual') is-invalid @enderror"
                                value="{{ old('harga_jual', $obat->harga_jual) }}"
                                required
                            >
                            @error('harga_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label for="stok">Stok</label>
                            <input
                                type="number"
                                id="stok"
                                name="stok"
                                class="neumorphic-input @error('stok') is-invalid @enderror"
                                value="{{ old('stok', $obat->stok) }}"
                                required
                            >
                            @error('stok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="neumorphic-btn mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
