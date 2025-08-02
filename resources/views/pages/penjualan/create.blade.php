@extends('layouts.app')

@section('content')

<form action="{{ route('penjualan.store') }}" method="POST" id="form-penjualan" onsubmit="submit.disabled = true; return true;">
    @csrf
    <div class="layout-px-spacing">

        <div class="row layout-spacing">
            <!-- Content -->
            <div class="col-lg-12 layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="layout-spacing pb-0 mb-2">
                        <div class="widget-header">
                            <h4>Penjualan</h4>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>No. Penjualan: </h4>
                                    <h3 class="font-weight-bold">{{ $no_transaksi }}</h3>
                                    <input type="hidden" name="no_penjualan" value="{{ $no_transaksi }}">
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-row mb-4">
                                        <div class="col">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal"
                                                required value="{{ date("Y-m-d") }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-5 layout-top-spacing">

                <div class="statbox widget box box-shadow">
                    <div class="layout-spacing pb-0 mb-4">
                        <div class="widget-header">
                            <h4>Pilih Obat</h4>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
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
                                                <a href="#"
                                                    class="btn btn-sm btn-primary rounded-circle bs-tooltip tambah_obat"
                                                    data-placement="top" title="" data-original-title="Tambah"
                                                    data-id={{ $item->id }} data-harga="{{ $item->harga_jual }}"
                                                    data-nama="{{ $item->nama_obat }}" data-stok="{{ $item->stok }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-plus-circle">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                                    </svg></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-7 layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="layout-spacing pb-0">
                        <div class="widget-header">
                            <h4>Detail Penjualan</h4>
                        </div>
                        <div class="widget-content widget-content-area">
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
                                </tbody>
                            </table>

                        </div>

                        <div class="widget-content widget-content-area">
                            <h5 class="d-inline">Grand Total : <span id="grand-total" class="font-weight-bold"></span>
                            </h5>
                            <div class="form-group row my-3">
                                <label for="bayar" class="col-sm-2 col-form-label col-form-label-sm">
                                    <h5>Bayar</h5>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="bayar" name="bayar"
                                        required>
                                </div>
                            </div>
                            <h5 class="d-inline">Kembalian : <span id="kembalian" class="font-weight-bold"></span></h5>
                            <div class="form-group mt-2">
                                <button type="submit" id="save" class="btn btn-primary">Simpan</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection
