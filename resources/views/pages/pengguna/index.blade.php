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
        box-shadow: 6px 6px 10px #a3b1c6, -6px -6px 10px #ffffff;
        padding: 6px 14px;
        color: #444;
        cursor: pointer;
        font-weight: 600;
        transition: box-shadow 0.3s ease, transform 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .neumorphic-btn:hover {
        box-shadow: inset 6px 6px 10px #a3b1c6, inset -6px -6px 10px #ffffff;
        transform: scale(1.05);
    }

    .btn-circle {
        width: 36px;
        height: 36px;
        padding: 6px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #e0e5ec;
        box-shadow: 6px 6px 10px #a3b1c6, -6px -6px 10px #ffffff;
        border: none;
        color: #444;
        cursor: pointer;
        transition: box-shadow 0.3s ease, transform 0.2s ease;
    }

    .btn-circle:hover {
        box-shadow: inset 6px 6px 10px #a3b1c6, inset -6px -6px 10px #ffffff;
        transform: scale(1.1);
        color: #222;
    }

    .btn-circle.text-danger:hover {
        color: #d33;
    }

    .neumorphic-table-wrapper {
        background: #e0e5ec;
        border-radius: 20px;
        padding: 10px;
        box-shadow: 9px 9px 16px #a3b1c6, -9px -9px 16px #ffffff;
    }

    table.table {
        background: transparent !important;
    }

    table.table-hover tbody tr:hover {
        background-color: transparent;
        box-shadow: inset 0 0 12px #d1d9e6;
    }

    [data-original-title] {
        color: #333 !important;
    }
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="neumorphic-box">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Data Pengguna</h4>
                    <a href="{{ route('pengguna.create') }}" class="neumorphic-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus mr-1">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah
                    </a>
                </div>
                <div class="neumorphic-table-wrapper table-responsive mb-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No. Telepon</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->level }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pengguna.edit', $item->id) }}" class="btn-circle"
                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-edit-2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
                                    @if (Auth::user()->id != $item->id)
                                    <form action="{{ route('pengguna.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-circle text-danger" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
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
