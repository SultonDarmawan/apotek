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

    /* Table hover style */
    table.table-hover tbody tr:hover {
        background-color: transparent;
        box-shadow: inset 0 0 15px #d1d9e6;
    }

    /* Button neumorphic */
    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        box-shadow: 6px 6px 10px #a3b1c6,
                    -6px -6px 10px #ffffff;
        color: #444;
        cursor: pointer;
        font-weight: 600;
        padding: 6px 14px;
        transition: box-shadow 0.3s ease, transform 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .neumorphic-btn:hover {
        box-shadow: inset 6px 6px 10px #a3b1c6,
                    inset -6px -6px 10px #ffffff;
        transform: scale(1.05);
    }

    /* Total grand style */
    #grand-total {
        font-weight: 700;
        font-size: 1.1rem;
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
                                <th>No. Pembelian</th>
                                <th>Supplier</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Total</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelians as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->no_pembelian }}</td>
                                <td>{{ $item->supplier->nama_supplier }}</td>
                                <td>{{ $item->tanggal_beli }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td class="total">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('laporan.pembelian.show', $item->id) }}"
                                        class="neumorphic-btn btn-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-center">Total Keseluruhan Pembelian :</th>
                                <th id="grand-total"></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
