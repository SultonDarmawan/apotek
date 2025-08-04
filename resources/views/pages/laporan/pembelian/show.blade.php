@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }

    .neumorphic-container {
        background: #e0e5ec;
        border-radius: 20px;
        box-shadow: 9px 9px 16px #a3b1c6, -9px -9px 16px #ffffff;
        padding: 30px;
        transition: box-shadow 0.3s ease;
    }

    .neumorphic-container:hover {
        box-shadow: inset 7px 7px 15px #a3b1c6, inset -7px -7px 15px #ffffff;
    }

    .neumorphic-list {
        background: #e0e5ec;
        border-radius: 15px;
        box-shadow: inset 4px 4px 6px #a3b1c6,
                    inset -4px -4px 6px #ffffff;
        margin-bottom: 20px;
        padding: 15px 20px;
        font-weight: 600;
        color: #444;
    }

    .neumorphic-list strong {
        font-weight: 700;
        color: #222;
    }

    .neumorphic-table-wrapper {
        background: #e0e5ec;
        border-radius: 20px;
        padding: 15px;
        box-shadow: 9px 9px 16px #a3b1c6,
                    -9px -9px 16px #ffffff;
    }

    table {
        background: transparent !important;
    }

    table thead th {
        background: #e0e5ec;
        box-shadow: inset 4px 4px 6px #a3b1c6,
                    inset -4px -4px 6px #ffffff;
        font-weight: 700;
        color: #333;
        border: none !important;
    }

    table tbody tr {
        box-shadow: 4px 4px 8px #a3b1c6,
                    -4px -4px 8px #ffffff;
        border-radius: 12px;
        margin-bottom: 10px;
        transition: box-shadow 0.3s ease;
    }

    table tbody tr:hover {
        box-shadow: inset 4px 4px 8px #a3b1c6,
                    inset -4px -4px 8px #ffffff;
    }

    table tbody td, table tfoot th {
        border: none !important;
        vertical-align: middle;
        color: #444;
        font-weight: 600;
    }

    table tfoot th {
        font-size: 1.1rem;
        color: #222;
    }

    /* Responsive tweak */
    @media (max-width: 767px) {
        .neumorphic-list {
            font-size: 14px;
            padding: 10px 15px;
        }

        .neumorphic-container {
            padding: 20px 15px;
        }
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing justify-content-center">
        <div class="col-12">
            <div class="neumorphic-container">
                <h4 class="mb-4 text-center">Detail Pembelian</h4>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="neumorphic-list">
                            No. Pembelian : <strong>{{ $pembelian->no_pembelian }}</strong><br>
                            Tanggal Pembelian : <strong>{{ $pembelian->tanggal_beli }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="neumorphic-list">
                            Supplier : <strong>{{ $pembelian->supplier->nama_supplier }}</strong><br>
                            Petugas : <strong>{{ $pembelian->user->nama }}</strong>
                        </div>
                    </div>
                </div>

                <div class="neumorphic-table-wrapper table-responsive">
                    <table class="table mb-0" style="width:100%">
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
                                <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                <td>{{ $item->jumlah_beli }}</td>
                                <td>{{ $item->tanggal_expire }}</td>
                                <td>Rp. {{ number_format($total[$item->obat->id], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-center">Grand Total :</th>
                                <th>Rp. {{ number_format($total_pembelian, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
