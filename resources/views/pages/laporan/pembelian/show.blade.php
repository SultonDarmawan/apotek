@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Detail Pembelian</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item">No. Pembelian :
                                    <strong>{{ $pembelian->no_pembelian }}</strong></li>
                                <li class="list-group-item">Tanggal Pembelian :
                                    <strong>{{ $pembelian->tanggal_beli }}</strong></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item">Supplier :
                                    <strong>{{ $pembelian->supplier->nama_supplier }}</strong></li>
                                <li class="list-group-item">Petugas : <strong>{{ $pembelian->user->nama }}</strong></li>
                            </ul>
                        </div>
                    </div>

                    <div class="table-responsive my-4">
                        <table class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Harga Beli</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Expire</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obat->nama_obat }}</td>
                                    <td>Rp. {{ number_format($item->harga_beli) }}</td>
                                    <td>{{ $item->jumlah_beli }}</td>
                                    <td>{{ $item->tanggal_expire }}</td>
                                    <td>Rp. {{ number_format($total[$item->obat->id]) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="text-center">Grand Total : </th>
                                    <th>Rp. {{ number_format($total_pembelian) }}</th>
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
