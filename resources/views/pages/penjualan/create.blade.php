@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }
    
    .neumorphic-card {
        background: #e0e5ec;
        border-radius: 20px;
        box-shadow: 9px 9px 16px #a3b1c6, -9px -9px 16px #ffffff;
        padding: 25px;
        margin-bottom: 30px;
        transition: box-shadow 0.3s ease;
    }
    .neumorphic-card:hover {
        box-shadow: inset 7px 7px 15px #a3b1c6, inset -7px -7px 15px #ffffff;
    }

    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        box-shadow: 4px 4px 8px #a3b1c6, -4px -4px 8px #ffffff;
        padding: 10px 18px;
        color: #333;
        font-weight: bold;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
    }

    .neumorphic-btn:hover {
        box-shadow: inset 4px 4px 8px #a3b1c6, inset -4px -4px 8px #ffffff;
        transform: scale(1.03);
    }

    .form-control, select {
        background: #e0e5ec !important;
        border: none;
        border-radius: 10px;
        box-shadow: inset 5px 5px 10px #a3b1c6, inset -5px -5px 10px #ffffff;
        padding: 10px;
        color: #333;
    }

    .table th, .table td {
        vertical-align: middle;
        background-color: transparent !important;
        color: #333;
    }

    .neumorphic-table {
        background: #e0e5ec;
        border-radius: 15px;
        box-shadow: 6px 6px 12px #a3b1c6, -6px -6px 12px #ffffff;
        padding: 10px;
    }

    /* Tombol tambah obat plus responsive */
    .neumorphic-btn.tambah_obat {
        min-width: 36px;
        min-height: 36px;
        padding: 0;
        font-size: 20px;
        text-align: center;
        line-height: 1;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }

    /* Responsive untuk kolom form */
    @media (max-width: 992px) {
        .col-lg-5, .col-lg-7 {
            flex: 0 0 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }
    }
</style>

<form action="{{ route('penjualan.store') }}" method="POST" id="form-penjualan" onsubmit="submit.disabled = true; return true;">
    @csrf
    <div class="layout-px-spacing">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing">
                <div class="neumorphic-card">
                    <h4 class="mb-3">Penjualan</h4>
                    <div class="row">
                        <div class="col-lg-5">
                            <h5>No. Penjualan:</h5>
                            <h3 class="font-weight-bold">{{ $no_transaksi }}</h3>
                            <input type="hidden" name="no_penjualan" value="{{ $no_transaksi }}">
                        </div>
                        <div class="col-lg-7">
                            <div class="form-row mb-2">
                                <div class="col">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" required value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 layout-top-spacing">
                <div class="neumorphic-card">
                    <h4 class="mb-3">Pilih Obat</h4>
                    <div class="neumorphic-table table-responsive">
                        <table id="zero-config" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obats as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_obat }}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td class="text-center">
                                        <a href="#" class="neumorphic-btn tambah_obat"
                                            data-id="{{ $item->id }}"
                                            data-harga="{{ $item->harga_jual }}"
                                            data-nama="{{ $item->nama_obat }}"
                                            data-stok="{{ $item->stok }}">
                                            +
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 layout-top-spacing">
                <div class="neumorphic-card">
                    <h4 class="mb-3">Detail Penjualan</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th>Obat</th>
                                    <th>Harga</th>
                                    <th width="15%">Jumlah</th>
                                    <th>Total</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody id="list-detail">
                                <!-- Obat yang dipilih akan ditambahkan via JS -->
                            </tbody>
                        </table>
                    </div>

                    <h5 class="d-inline">Grand Total : <span id="grand-total" class="font-weight-bold">Rp 0</span></h5>
                    
                    <div class="form-group row my-3">
                        <label for="bayar" class="col-sm-2 col-form-label col-form-label-sm"><h5>Bayar</h5></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="bayar" name="bayar" required>
                        </div>
                    </div>

                    <h5 class="d-inline">Kembalian : <span id="kembalian" class="font-weight-bold">Rp 0</span></h5>

                    <div class="form-group mt-3">
                        <button type="submit" class="neumorphic-btn">💾 Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
