@extends('layouts.app')

@section('content')

<style>
    body {
        background: #e0e5ec;
    }

    .neumorphic-box {
        background: #e0e5ec;
        border-radius: 15px;
        box-shadow: 8px 8px 16px #a3b1c6,
                    -8px -8px 16px #ffffff;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .neumorphic-box:hover {
        box-shadow: 4px 4px 8px #a3b1c6,
                    -4px -4px 8px #ffffff;
        transform: translateY(-4px) scale(1.02);
    }

    .neumorphic-alert {
        background: #e0e5ec;
        border-radius: 12px;
        box-shadow: inset 6px 6px 12px #a3b1c6,
                    inset -6px -6px 12px #ffffff;
        padding: 20px;
        color: #333;
        margin-bottom: 30px;
    }

    .neumorphic-table {
        background: #e0e5ec;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 6px 6px 12px #a3b1c6,
                    -6px -6px 12px #ffffff;
        padding: 15px;
    }

    .neumorphic-table th, .neumorphic-table td {
        background-color: #e0e5ec;
        border: none;
        color: #333;
    }

    .neumorphic-widget-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #e0e5ec;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 4px 4px 8px #a3b1c6,
                    -4px -4px 8px #ffffff;
        transition: all 0.3s ease-in-out;
    }

    .neumorphic-widget-icon:hover {
        box-shadow: 2px 2px 4px #a3b1c6,
                    -2px -2px 4px #ffffff;
        transform: scale(1.05);
    }

    .neumorphic-heading {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
    }
</style>

<div class="layout-px-spacing">

    @if($expiredMedicines->count() > 0 || $outOfStock->count() > 0)
    <div class="neumorphic-alert">
        <h4 class="alert-heading">⚠️ Peringatan!</h4>
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
    @endif

    @if (Auth::user()->level == 'Admin')
    <div class="row">
        {{-- Pembelian --}}
        <div class="col-lg-6">
            <div class="neumorphic-box d-flex align-items-center">
                <div class="neumorphic-widget-icon mr-3">
                    {{-- Keranjang biasa --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </div>
                <div>
                    <div class="h5 mb-0">Rp.{{ number_format($total_pembelian_bulan_ini) }}</div>
                    <small>Pembelian Bulan Ini</small>
                </div>
            </div>
        </div>

        {{-- Penjualan --}}
        <div class="col-lg-6">
            <div class="neumorphic-box d-flex align-items-center">
                <div class="neumorphic-widget-icon mr-3">
                    {{-- Keranjang keluar (dengan silang) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        <line x1="9" y1="7" x2="15" y2="13"></line>
                        <line x1="15" y1="7" x2="9" y2="13"></line>
                    </svg>
                </div>
                <div>
                    <div class="h5 mb-0">Rp.{{ number_format($total_penjualan_bulan_ini) }}</div>
                    <small>Penjualan Bulan Ini</small>
                </div>
            </div>
        </div>

        {{-- HPP --}}
        <div class="col-lg-6">
            <div class="neumorphic-box d-flex align-items-center">
                <div class="neumorphic-widget-icon mr-3">
                    {{-- Ikon uang --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-dollar-sign">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
                <div>
                    <div class="h5 mb-0">Rp.{{ number_format($hpp) }}</div>
                    <small>HPP Bulan Ini</small>
                </div>
            </div>
        </div>

        {{-- Laba --}}
        <div class="col-lg-6">
            <div class="neumorphic-box d-flex align-items-center">
                <div class="neumorphic-widget-icon mr-3">
                    {{-- Ikon uang --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-dollar-sign">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
                <div>
                    <div class="h5 mb-0">Rp.{{ number_format($laba) }}</div>
                    <small>Laba Bulan Ini</small>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="neumorphic-box">
                <div class="neumorphic-heading">Obat Expired dalam 30 hari</div>
                <div class="neumorphic-table">
                    <table class="table table-borderless">
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

        <div class="col-lg-4">
            <div class="neumorphic-box">
                <div class="neumorphic-heading">5 Obat Terlaris</div>
                <div class="neumorphic-table">
                    <table class="table table-borderless">
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

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        @if($expiredMedicines->count() > 0 || $outOfStock->count() > 0)
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
