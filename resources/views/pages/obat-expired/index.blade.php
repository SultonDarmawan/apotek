@extends('layouts.app')

@section('content')
<style>
    body {
        background: #e0e5ec;
    }
    .neumorphic-box {
        background: #e0e5ec;
        border-radius: 20px;
        box-shadow: 9px 9px 16px #a3b1c6, -9px -9px 16px #ffffff;
        padding: 25px;
        margin-bottom: 30px;
        transition: box-shadow 0.3s ease;
    }
    .neumorphic-box:hover {
        box-shadow: inset 7px 7px 15px #a3b1c6, inset -7px -7px 15px #ffffff;
    }

    .neumorphic-btn {
        background: #e0e5ec;
        border: none;
        border-radius: 12px;
        box-shadow: 4px 4px 8px #a3b1c6, -4px -4px 8px #ffffff;
        padding: 6px 14px;
        color: #333;
        font-weight: bold;
        transition: all 0.2s ease-in-out;
    }

    .neumorphic-btn:hover {
        box-shadow: inset 4px 4px 8px #a3b1c6, inset -4px -4px 8px #ffffff;
        transform: scale(1.02);
    }

    .neumorphic-table {
        background: #e0e5ec;
        border-radius: 15px;
        padding: 10px;
        box-shadow: 6px 6px 12px #a3b1c6, -6px -6px 12px #ffffff;
    }

    .neumorphic-table th,
    .neumorphic-table td {
        background: transparent !important;
        border: none !important;
        color: #333;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }

</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Obat Expired</h4>
                </div>

                <div class="table-responsive neumorphic-table mb-3">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                                <th>No. Pembelian</th>
                                <th>Tanggal Expire</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expired as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->obat->nama_obat }}</td>
                                <td>{{ $item->jumlah_sisa }}</td>
                                <td>{{ $item->pembelian->no_pembelian }}</td>
                                <td>{{ $item->tanggal_expire }}</td>
                                <td class="text-center">
                                    <form action="{{ route('obat-expired.hapus', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="neumorphic-btn"
                                            onclick="return confirm('Yakin ingin menghapus stok obat ini?')">
                                            Hapus Stok
                                        </button>
                                    </form>
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
@endsection
