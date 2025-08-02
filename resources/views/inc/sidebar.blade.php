    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">

                    <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" data-active="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}"
                            aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ ($category_name === 'master data') ? 'active' : '' }}">
                        <a href="#master" data-active="{{ ($category_name === 'master data') ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ ($category_name === 'master data') ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-box">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                </path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>Master Data</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'master data') ? 'show' : '' }}"
                            id="master" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'kategori') ? 'active' : '' }}">
                                <a href="{{ route('kategori.index') }}"> Kategori </a>
                            </li>
                            <li class="{{ ($page_name === 'obat') ? 'active' : '' }}">
                                <a href="{{ route('obat.index') }}"> Obat </a>
                            </li>
                            <li class="{{ ($page_name === 'supplier') ? 'active' : '' }}">
                                <a href="{{ route('supplier.index') }}"> Supplier </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'obat-expired') ? 'active' : '' }}">
                        <a href="{{ route('obat-expired') }}" data-active="{{ ($category_name === 'obat-expired') ? 'true' : 'false' }}"
                            aria-expanded="{{ ($category_name === 'obat-expired') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                                <span>Obat Expired</span>
                            </div>
                            <div>
                                @if (\App\Helpers\Helper::expired() > 0)
                                    <span class="badge badge-danger pills">{{ \Helper::expired() }}</span>
                                @endif
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ ($category_name === 'transaksi') ? 'active' : '' }}">
                        <a href="#transaksi" data-active="{{ ($category_name === 'transaksi') ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ ($category_name === 'transaksi') ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span>Transaksi</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'transaksi') ? 'show' : '' }}"
                            id="transaksi" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'pembelian') ? 'active' : '' }}">
                                <a href="{{ route('pembelian.create') }}"> Pembelian </a>
                            </li>
                            <li class="{{ ($page_name === 'penjualan') ? 'active' : '' }}">
                                <a href="{{ route('penjualan.create') }}"> Penjualan </a>
                            </li>
                        </ul>
                    </li>

                    @if (Auth::user()->level == 'Admin')
                    <li class="menu {{ ($category_name === 'laporan') ? 'active' : '' }}">
                        <a href="#laporan" data-active="{{ ($category_name === 'laporan') ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ ($category_name === 'laporan') ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                            <span>Laporan</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'laporan') ? 'show' : '' }}"
                            id="laporan" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'laporan-pembelian') ? 'active' : '' }}">
                                <a href="{{ route('laporan.pembelian') }}"> Pembelian </a>
                            </li>
                            <li class="{{ ($page_name === 'laporan-penjualan') ? 'active' : '' }}">
                                <a href="{{ route('laporan.penjualan') }}"> Penjualan </a>
                            </li>
                            <li class="{{ ($page_name === 'stok-obat') ? 'active' : '' }}">
                                <a href="{{ route('laporan.stok-obat') }}"> Stok Obat </a>
                            </li>
                            <li class="{{ ($page_name === 'laba') ? 'active' : '' }}">
                                <a href="{{ route('laporan.laba') }}"> Laba </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'pengguna') ? 'active' : '' }}">
                        <a href="{{ route('pengguna.index') }}" data-active="{{ ($category_name === 'pengguna') ? 'true' : 'false' }}"
                            aria-expanded="{{ ($category_name === 'pengguna') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Pengguna</span>
                            </div>
                        </a>
                    </li>
                    @endif


            </ul>

        </nav>

    </div>
    <!--  END SIDEBAR  -->

