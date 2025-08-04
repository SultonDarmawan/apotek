@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }

    .neumorphic-box {
        background: #e0e5ec;
        border-radius: 20px;
        box-shadow: 9px 9px 16px #a3b1c6,
                    -9px -9px 16px #ffffff;
        padding: 30px 25px 40px;
        margin-bottom: 30px;
        transition: box-shadow 0.3s ease;
    }

    .neumorphic-box:hover {
        box-shadow: inset 7px 7px 15px #a3b1c6,
                    inset -7px -7px 15px #ffffff;
    }

    /* Table container neumorphic */
    .neumorphic-table-wrapper {
        background: #e0e5ec;
        border-radius: 20px;
        padding: 15px;
        box-shadow: 9px 9px 16px #a3b1c6,
                    -9px -9px 16px #ffffff;
    }

    /* Table styling */
    table.table-hover tbody tr:hover {
        background-color: transparent;
        box-shadow: inset 0 0 15px #d1d9e6;
    }

    /* Highlight row when stok 0 */
    .table-danger {
        background: #f2dede !important;
        box-shadow: inset 5px 5px 12px #c0392b, inset -5px -5px 12px #f8b6b6 !important;
        color: #a94442 !important;
    }

    /* Header styling */
    .widget-header h4 {
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }

    th, td {
        vertical-align: middle !important;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <div class="widget-header">
                    <h4>Laporan Stok Obat</h4>
                </div>
                <div class="neumorphic-table-wrapper table-responsive mb-4">
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
                            <tr @if($item->jumlah_sisa == 0) class="table-danger" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->obat->nama_obat }}</td>
                                <td>{{ $item->pembelian->no_pembelian }}</td>
                                <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                <td>{{ $item->tanggal_expire }}</td>
                                <td>{{ $item->jumlah_sisa }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
