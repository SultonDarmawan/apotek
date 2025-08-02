@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row py-2 pr-4">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <h4>Laporan Penjualan</h4>
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
                                    <th>No. Penjualan</th>
                                    <th>Tanggal</th>
                                    <th>User</th>
                                    <th>Total</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualans as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_penjualan }}</td>
                                    <td>{{ $item->tanggal_jual }}</td>
                                    <td>{{ $item->user->nama }}</td>
                                    <td class="total">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('laporan.penjualan.show', $item->id) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">Total Keseluruhan Penjualan : </th>
                                    <th id="grand-total"></th>
                                    {{-- <th>Rp. {{ number_format($total_penjualan, 0, ',', '.') }}</th> --}}
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
