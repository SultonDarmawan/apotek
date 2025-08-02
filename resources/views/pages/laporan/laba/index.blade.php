@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row py-2 pr-4">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <h4>Laporan Laba</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row mb-4">
                                <div class="col">
                                    <label for="min">Tanggal Awal</label>
                                    <input type="text" id="min" class="form-control form-control-sm" name="min" value="{{ date('Y-m-01') }}">
                                </div>
                                <div class="col">
                                    <label for="max">Tanggal Akhir</label>
                                    <input type="text" id="max" class="form-control form-control-sm" name="max" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mb-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No. Penjualan</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <th>No. Pembelian</th>
                                    <th>Harga Beli</th>
                                    <th>Penjualan</th>
                                    <th>HPP</th>
                                    <th>Laba</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laba as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->detail_penjualan->penjualan->tanggal_jual }}</td>
                                    <td>{{ $item->detail_penjualan->penjualan->no_penjualan }}</td>
                                    <td>{{ $item->detail_pembelian->obat->nama_obat }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>Rp{{ number_format($item->detail_penjualan->harga_jual, 0, ',', '.') }}</td>
                                    <td>{{ $item->detail_pembelian->pembelian->no_pembelian }}</td>
                                    <td>Rp{{ number_format($item->detail_pembelian->harga_beli, 0, ',', '.') }}</td>
                                    <td class="item_penjualan">Rp.{{ number_format($item->jumlah * $item->detail_penjualan->harga_jual, 0, ',', '.') }}</td>
                                    <td class="item_hpp">Rp{{ number_format($item->jumlah * $item->detail_pembelian->harga_beli, 0, ',', '.') }}</td>
                                    <td class="item_laba">Rp{{ number_format(($item->jumlah * $item->detail_penjualan->harga_jual) - ($item->jumlah * $item->detail_pembelian->harga_beli), 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="8" class="text-center">Total</th>
                                    <th id="total_penjualan"></th>
                                    <th id="total_hpp"></th>
                                    <th id="total_laba"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
