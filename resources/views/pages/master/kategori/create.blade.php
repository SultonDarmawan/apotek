@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }

    .neumorphic-box {
        background: #e0e5ec;
        border-radius: 15px;
        box-shadow: 8px 8px 16px #a3b1c6,
                    -8px -8px 16px #ffffff;
        padding: 25px;
        transition: all 0.3s ease-in-out;
    }

    .neumorphic-box:hover {
        box-shadow: 4px 4px 8px #a3b1c6,
                    -4px -4px 8px #ffffff;
    }

    .neumorphic-input {
        background: #e0e5ec;
        border: none;
        border-radius: 10px;
        padding: 10px 15px;
        width: 100%;
        box-shadow: inset 4px 4px 8px #a3b1c6,
                    inset -4px -4px 8px #ffffff;
        color: #333;
        margin-bottom: 15px;
    }

    .neumorphic-input:focus {
        outline: none;
        box-shadow: inset 2px 2px 4px #a3b1c6,
                    inset -2px -2px 4px #ffffff;
    }

    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        box-shadow: 4px 4px 8px #a3b1c6,
                    -4px -4px 8px #ffffff;
        padding: 10px 20px;
        color: #333;
        font-weight: bold;
        transition: all 0.2s ease-in-out;
    }

    .neumorphic-btn:hover {
        box-shadow: inset 4px 4px 8px #a3b1c6,
                    inset -4px -4px 8px #ffffff;
        transform: scale(1.02);
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
    }

</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <h4 class="mb-4">Tambah Kategori</h4>

                <div class="row">
                    <div class="col-lg-6 col-12">
                        {{-- form --}}
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf

                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori"
                                class="neumorphic-input @error('nama_kategori') is-invalid @enderror"
                                value="{{ old('nama_kategori') }}" required>

                            @error('nama_kategori')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <button type="submit" class="neumorphic-btn mt-3">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
