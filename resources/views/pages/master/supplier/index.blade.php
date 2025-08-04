@extends('layouts.app')

@section('content')
<style>
  body {
    background: #e0e5ec;
  }

    /* Container neumorphic */
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

  /* Header */
  .neumorphic-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  /* Neumorphic button */
  .neumorphic-btn {
    background: #e0e5ec;
    border: none;
    border-radius: 12px;
    box-shadow: 6px 6px 10px #a3b1c6, -6px -6px 10px #ffffff;
    color: #444;
    font-weight: 600;
    padding: 8px 18px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: box-shadow 0.3s ease, transform 0.2s ease;
    text-decoration: none;
  }

  .neumorphic-btn:hover {
    box-shadow: inset 6px 6px 10px #a3b1c6, inset -6px -6px 10px #ffffff;
    transform: scale(1.05);
  }

  .neumorphic-btn svg {
    margin-right: 6px;
  }

  /* Circular buttons (edit/delete) */
  .btn-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: none;
    background: #e0e5ec;
    box-shadow: 6px 6px 10px #a3b1c6, -6px -6px 10px #ffffff;
    color: #444;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: box-shadow 0.3s ease, transform 0.2s ease;
  }
  .btn-circle:hover {
    box-shadow: inset 6px 6px 10px #a3b1c6, inset -6px -6px 10px #ffffff;
    transform: scale(1.1);
    color: #222;
  }

  /* Table wrapper with neumorphism */
  .neumorphic-table-wrapper {
    background: #e0e5ec;
    border-radius: 20px;
    padding: 15px;
    box-shadow: 9px 9px 16px #a3b1c6, -9px -9px 16px #ffffff;
  }

  /* Transparent table background */
  table.table {
    background: transparent !important;
  }

  /* Table row hover effect */
  table.table-hover tbody tr:hover {
    background-color: transparent;
    box-shadow: inset 0 0 12px #d1d9e6;
  }

</style>

<div class="layout-px-spacing">
  <div class="row layout-top-spacing layout-spacing">
    <div class="col-lg-12">
      <div class="neumorphic-box">
        <div class="neumorphic-header">
          <h4>Data Supplier</h4>
          <a href="{{ route('supplier.create') }}" class="neumorphic-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
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
                <th>Nama Supplier</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($suppliers as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_supplier }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>{{ $item->alamat }}</td>
                <td class="text-center">
                  <a href="{{ route('supplier.edit', $item->id) }}" class="btn-circle" data-toggle="tooltip" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                  </a>
                  <form action="{{ route('supplier.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn-circle text-danger" data-toggle="tooltip" title="Delete"
                      onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
