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

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #555;
    }

    /* Neumorphic input */
    input[type="text"].form-control {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        box-shadow: inset 6px 6px 10px #a3b1c6,
                    inset -6px -6px 10px #ffffff;
        color: #333;
        padding: 8px 12px;
        transition: box-shadow 0.3s ease;
    }
    input[type="text"].form-control:focus {
        outline: none;
        box-shadow: inset 3px 3px 6px #a3b1c6,
                    inset -3px -3px 6px #ffffff;
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

    /* Total footer style */
    tfoot th {
        font-weight: 700;
        font-size: 1rem;
        color: #333;
    }

    #total_penjualan, #total_hpp, #total_laba {
        font-weight: 700;
        color: #333;
        text-align: right;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="min">Tanggal Awal</label>
                        <input type="text" id="min" class="form-control form-control-sm" name="min" value="{{ date('Y-m-01') }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="max">Tanggal Akhir</label>
                        <input type="text" id="max" class="form-control form-control-sm" name="max" value="{{ date('Y-m-d') }}">
                    </div>
                </div>

                <div class="neumorphic-table-wrapper table-responsive">
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
                                <td class="item_penjualan">Rp{{ number_format($item->jumlah * $item->detail_penjualan->harga_jual, 0, ',', '.') }}</td>
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let totalPenjualan = 0, totalHpp = 0, totalLaba = 0;

        document.querySelectorAll('td.item_penjualan').forEach(td => {
            let val = td.textContent.replace(/[Rp.\s]/g, '');
            totalPenjualan += parseInt(val) || 0;
        });
        document.querySelectorAll('td.item_hpp').forEach(td => {
            let val = td.textContent.replace(/[Rp.\s]/g, '');
            totalHpp += parseInt(val) || 0;
        });
        document.querySelectorAll('td.item_laba').forEach(td => {
            let val = td.textContent.replace(/[Rp.\s]/g, '');
            totalLaba += parseInt(val) || 0;
        });

        document.getElementById('total_penjualan').textContent = 'Rp ' + totalPenjualan.toLocaleString('id-ID');
        document.getElementById('total_hpp').textContent = 'Rp ' + totalHpp.toLocaleString('id-ID');
        document.getElementById('total_laba').textContent = 'Rp ' + totalLaba.toLocaleString('id-ID');
    });
</script>
@endsection
