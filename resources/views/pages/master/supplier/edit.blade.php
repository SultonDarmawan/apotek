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

    .neumorphic-input, .neumorphic-textarea {
        background: #e0e5ec;
        border: none;
        border-radius: 10px;
        padding: 12px 15px;
        width: 100%;
        box-shadow: inset 4px 4px 8px #a3b1c6,
                    inset -4px -4px 8px #ffffff;
        color: #333;
        margin-bottom: 15px;
        font-size: 1rem;
        transition: box-shadow 0.3s ease;
        resize: vertical;
    }

    .neumorphic-input:focus, .neumorphic-textarea:focus {
        outline: none;
        box-shadow: inset 2px 2px 6px #a3b1c6,
                    inset -2px -2px 6px #ffffff;
    }

    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        box-shadow: 4px 4px 8px #a3b1c6,
                    -4px -4px 8px #ffffff;
        padding: 12px 20px;
        color: #333;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        width: 100%;
    }

    .neumorphic-btn:hover {
        box-shadow: inset 4px 4px 8px #a3b1c6,
                    inset -4px -4px 8px #ffffff;
        transform: scale(1.03);
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #555;
        font-size: 1rem;
    }

    small.text-danger {
        display: block;
        margin-top: -10px;
        margin-bottom: 10px;
        font-weight: 500;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing justify-content-center">
        <div class="col-12">
            <div class="neumorphic-box">
                <h4 class="mb-4 text-center">Edit Supplier</h4>

                <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    {{-- Contoh modifikasi form fields dengan class neumorphic-input --}}
                    <label for="nama_supplier">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="nama_supplier"
                        class="neumorphic-input @error('nama_supplier') is-invalid @enderror"
                        value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                    @error('nama_supplier')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <label for="no_telp">No. Telepon</label>
                    <input type="text" name="no_telp" id="no_telp"
                        class="neumorphic-input @error('no_telp') is-invalid @enderror"
                        value="{{ old('no_telp', $supplier->no_telp) }}" required>
                    @error('no_telp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="4"
                        class="neumorphic-textarea @error('alamat') is-invalid @enderror" required>{{ old('alamat', $supplier->alamat) }}</textarea>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <button type="submit" class="neumorphic-btn mt-3">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
