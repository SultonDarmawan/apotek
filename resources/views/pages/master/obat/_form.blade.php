<div class="form-group">
    <label for="nama">Nama Obat</label>
    <input type="text" class="form-control" id="nama" name="nama_obat" autofocus required value="{{ old('nama_obat', $obat->nama_obat) }}">
    @error('nama_obat')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="kategori">Kategori</label>
    <select class="form-control" id="kategori" name="kategori_id">
        @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->id }}" {{ old('kategori_id', $obat->kategori_id) == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
        @endforeach
    </select>
    @error('kategori_id')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="harga_beli">Harga Beli</label>
    <input type="number" class="form-control" id="harga_beli" name="harga_beli" required value="{{ old('harga_beli', $obat->harga_beli) }}">
    @error('harga_beli')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="harga_jual">Harga Jual</label>
    <input type="number" class="form-control" id="harga_jual" name="harga_jual" required value="{{ old('harga_jual', $obat->harga_jual) }}">
    @error('harga_jual')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
