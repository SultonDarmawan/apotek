<div class="form-group">
    <label for="nama">Nama Supplier</label>
    <input type="text" class="form-control" id="nama" name="nama_supplier" autofocus required value="{{ old('nama_supplier', $supplier->nama_supplier) }}">
    @error('nama_supplier')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="no_telp">No. Telepon</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" required value="{{ old('no_telp', $supplier->no_telp) }}">
    @error('no_telp')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $supplier->alamat) }}</textarea>
    @error('alamat')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
