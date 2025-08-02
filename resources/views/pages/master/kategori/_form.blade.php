<div class="form-group">
    <label for="nama">Nama Kategori</label>
    <input type="text" class="form-control" id="nama" name="nama_kategori" autofocus required value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
    @error('nama_kategori')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
