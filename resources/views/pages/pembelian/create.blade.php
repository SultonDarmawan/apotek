@extends('layouts.app')

@section('content')

<form action="{{ route('pembelian.store') }}" method="POST" id="form-pembelian" onsubmit="submit.disabled = true; return true;">
    @csrf
    <div class="layout-px-spacing">

        <div class="row layout-spacing">
            <!-- Content -->
            <div class="col-lg-12 layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="layout-spacing pb-0 mb-2">
                        <div class="widget-header">
                            <h4>Pembelian</h4>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>No. Pembelian: </h4>
                                    <h3 class="font-weight-bold">{{ $no_transaksi }}</h3>
                                    <input type="hidden" value="{{ $no_transaksi }}" name="no_pembelian">
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-row mb-4">
                                        <div class="col">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" class="form-control form-control-sm" id="tanggal"
                                                name="tanggal" required value="{{ date("Y-m-d") }}">
                                        </div>
                                        <div class="col">
                                            <label for="supplier">Supplier</label>
                                            <select class="form-control form-control-sm" id="supplier" name="supplier"
                                                required>
                                                <option value="">Pilih Supplier</option>
                                                @foreach ($suppliers as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                                @endforeach
                                            </select>
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
                                                    data-id={{ $item->id }} data-harga="{{ $item->harga_beli }}"
                                                    data-nama="{{ $item->nama_obat }} ">
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
                            <h4>Detail Pembelian</h4>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-4">
                                <thead>
                                    <tr>
                                        <th>Obat</th>
                                        <th width="20%">Harga Beli</th>
                                        <th width="15%">Jumlah</th>
                                        <th width="20%">Tanggal Expire</th>
                                        <th>Total</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody id="list-detail">
                                </tbody>
                            </table>
                            <div class="table-responsive mb-4">
                        </div>

                        <div class="widget-content widget-content-area">
                            <h5 class="d-inline">Grand Total : <span id="grand-total" class="font-weight-bold"></span>
                            </h5>
                            <div class="form-group mt-2">
                                <button type="submit" name="submit" id="save" class="btn btn-primary">Simpan</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection
