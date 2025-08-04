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
        padding: 30px 25px;
        margin-bottom: 30px;
        transition: box-shadow 0.3s ease;
    }
    .neumorphic-box:hover {
        box-shadow: inset 7px 7px 15px #a3b1c6,
                    inset -7px -7px 15px #ffffff;
    }

    h4 {
        font-weight: 700;
        color: #444;
    }

    /* Neumorphic list group */
    .neumorphic-list {
        background: #e0e5ec;
        border-radius: 15px;
        box-shadow: inset 6px 6px 10px #a3b1c6,
                    inset -6px -6px 10px #ffffff;
        padding: 15px 20px;
        margin-bottom: 20px;
        list-style: none;
    }
    .neumorphic-list li {
        padding: 8px 0;
        border-bottom: 1px solid #d6dbe5;
        color: #333;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
    }
    .neumorphic-list li:last-child {
        border-bottom: none;
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
    table {
        background: transparent !important;
        border-collapse: separate !important;
        border-spacing: 0 10px;
        width: 100%;
    }
    table thead tr th {
        background: #e0e5ec;
        color: #555;
        font-weight: 700;
        padding: 12px 15px;
        border-radius: 12px;
    }
    table tbody tr {
        background: #e0e5ec;
        box-shadow: 6px 6px 10px #a3b1c6,
                    -6px -6px 10px #ffffff;
        border-radius: 15px;
    }
    table tbody tr td {
        padding: 12px 15px;
        color: #444;
        vertical-align: middle;
        font-weight: 600;
    }
    table tbody tr:hover {
        box-shadow: inset 6px 6px 10px #a3b1c6,
                    inset -6px -6px 10px #ffffff;
        cursor: default;
    }

    table tfoot tr th {
        background: transparent;
        border: none;
        font-weight: 700;
        font-size: 1.15rem;
        color: #333;
        padding: 12px 15px;
    }
    table tfoot tr th[colspan="4"] {
        text-align: right;
        padding-right: 20px;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <h4 class="mb-4">Detail Penjualan</h4>

                <div class="row mb-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="neumorphic-list">
                            <li>No. Penjualan: <span>{{ $penjualan->no_penjualan }}</span></li>
                            <li>Tanggal Penjualan: <span>{{ $penjualan->tanggal_jual }}</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="neumorphic-list">
                            <li>Petugas: <span>{{ $penjualan->user->nama }}</span></li>
                            <li>Bayar: <span>Rp. {{ number_format($penjualan->bayar) }}</span></li>
                        </ul>
                    </div>
                </div>

                <div class="neumorphic-table-wrapper table-responsive">
                    <table>
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
                                <th colspan="4" class="text-center">Grand Total :</th>
                                <th>Rp. {{ number_format($total_penjualan) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
