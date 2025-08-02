@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Detail Penjualan</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item">No. Penjualan :
                                    <strong>{{ $penjualan->no_penjualan }}</strong></li>
                                <li class="list-group-item">Tanggal Penjualan :
                                    <strong>{{ $penjualan->tanggal_jual }}</strong></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item">Petugas : <strong>{{ $penjualan->user->nama }}</strong></li>
                                <li class="list-group-item">Bayar : <strong>Rp.
                                        {{ number_format($penjualan->bayar) }}</strong></li>
                            </ul>
                        </div>
                    </div>

                    <div class="table-responsive my-4">
                        <table class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obat->nama_obat }}</td>
                                    <td>Rp. {{ number_format($item->harga_jual) }}</td>
                                    <td>{{ $item->jumlah_jual }}</td>
                                    <td>Rp. {{ number_format($total[$item->obat->id]) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">Grand Total : </th>
                                    <th>Rp. {{ number_format($total_penjualan) }}</th>
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
