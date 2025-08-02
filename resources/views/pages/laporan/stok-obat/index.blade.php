@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row py-2 pr-4">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <h4>Laporan Stok Obat</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>No. Pembelian</th>
                                    <th>Harga Beli</th>
                                    <th>Tanggal Expire</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $item)
                                @if ($item->jumlah_sisa == 0)
                                <tr class="table-danger">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obat->nama_obat }}</td>
                                    <td>{{ $item->pembelian->no_pembelian }}</td>
                                    <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                    <td>{{ $item->tanggal_expire }}</td>
                                    <td>{{ $item->jumlah_sisa }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obat->nama_obat }}</td>
                                    <td>{{ $item->pembelian->no_pembelian }}</td>
                                    <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                    <td>{{ $item->tanggal_expire }}</td>
                                    <td>{{ $item->jumlah_sisa }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
