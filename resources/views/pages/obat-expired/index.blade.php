@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row py-2 pr-4">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <h4>Obat Expired</h4>
                        </div>
                        {{-- <div class="col-xl-6 col-md-6 col-sm-6 col-6 m-auto text-right">
                            <a href="{{ route('obat.create') }}" class="btn btn-primary">Riwayat</a>
                        </div> --}}
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
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
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                onclick="return confirm('Yakin ingin menghapus stok obat ini?')">Hapus
                                                Stok</button>
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

</div>
@endsection
