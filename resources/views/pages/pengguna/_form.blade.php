<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" autofocus required value="{{ old('nama', $pengguna->nama) }}">
    @error('nama')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="no_telp">No. Telepon</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" required value="{{ old('no_telp', $pengguna->no_telp) }}">
    @error('no_telp')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $pengguna->alamat) }}</textarea>
    @error('alamat')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="level">Level</label>
    <select class="form-control" id="level" name="level">
        <option value="Admin" {{ old('level', $pengguna->level) == 'Admin' ? 'selected' : '' }}>Admin</option>
        <option value="Petugas" {{ old('level', $pengguna->level) == 'Petugas' ? 'selected' : '' }}>Petugas</option>
    </select>
    @error('level')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" required value="{{ old('email', $pengguna->email) }}">
    @error('email')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
    @error('password')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
