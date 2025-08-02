@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    {{-- Notifikasi --}}
    @if($expiredMedicines->count() > 0 || $outOfStock->count() > 0)
    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert-body">
            <h4 class="alert-heading">Peringatan!</h4>
            @if($expiredMedicines->count() > 0)
                <p>Ada <strong>{{ $expiredMedicines->count() }}</strong> obat yang sudah kadaluarsa:</p>
                <ul>
                    @foreach($expiredMedicines as $item)
                        <li>{{ $item->obat->nama_obat }} (Exp: {{ $item->tanggal_expire }}, Sisa: {{ $item->jumlah_sisa }})</li>
                    @endforeach
                </ul>
            @endif
            @if($outOfStock->count() > 0)
                <p>Ada <strong>{{ $outOfStock->count() }}</strong> obat yang stoknya habis:</p>
                <ul>
                    @foreach($outOfStock as $item)
                        <li>{{ $item->nama_obat }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    @endif
    @if (Auth::user()->level == 'Admin')
    <div class="row layout-top-spacing">

        <div class="col-lg-6 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value justify-content-start">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shopping-cart">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </div>
                        <div class="w-content ml-3">
                            <span class="w-value">Rp.{{ number_format($total_pembelian_bulan_ini) }}</span>
                            <span class="w-numeric-title">Pembelian Bulan Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value justify-content-start">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shopping-cart">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </div>
                        <div class="w-content ml-3">
                            <span class="w-value">Rp.{{ number_format($total_penjualan_bulan_ini) }}</span>
                            <span class="w-numeric-title">Penjualan Bulan Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value justify-content-start">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="w-content ml-3">
                            <span class="w-value">Rp.{{ number_format($hpp) }}</span>
                            <span class="w-numeric-title">HPP Bulan Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value justify-content-start">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="w-content ml-3">
                            <span class="w-value">Rp.{{ number_format($laba) }}</span>
                            <span class="w-numeric-title">Laba Bulan Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row layout-top-spacing">
        <div class="col-lg-8">
            <div class="statbox widget box box-shadow mb-4">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Obat Expired dalam 30 hari</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Obat</th>
                                    <th>Pembelian</th>
                                    <th>Stok</th>
                                    <th>Tanggal Expire</th>
                                    <th>Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($goToExpire as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obat->nama_obat }}</td>
                                    <td>{{ $item->pembelian->no_pembelian }}</td>
                                    <td>{{ $item->jumlah_sisa }}</td>
                                    <td>{{ $item->tanggal_expire }}</td>
                                    <td>{{ $sisa[$loop->index] }} Hari</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>5 Obat Terlaris</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Obat</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laris as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obat->nama_obat }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Chart</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

</div>

@endsection
@section('scripts')
<script>
    // Munculkan notifikasi otomatis jika ada obat kadaluarsa atau habis
    $(document).ready(function() {
        @if($expiredMedicines->count() > 0 || $outOfStock->count() > 0)
            // Tampilkan modal notifikasi
            Swal.fire({
                title: 'Peringatan!',
                html: `
                    @if($expiredMedicines->count() > 0)
                        <p>Ada <strong>{{ $expiredMedicines->count() }}</strong> obat yang sudah kadaluarsa.</p>
                    @endif
                    @if($outOfStock->count() > 0)
                        <p>Ada <strong>{{ $outOfStock->count() }}</strong> obat yang stoknya habis.</p>
                    @endif
                    <p>Silakan cek notifikasi di bagian atas halaman untuk detail lebih lanjut.</p>
                `,
                icon: 'warning',
                confirmButtonText: 'Mengerti',
                confirmButtonColor: '#e7515a'
            });
        @endif
    });
</script>
@endsection