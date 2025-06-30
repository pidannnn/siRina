@extends('layouts.app')

@section('title', 'Tambah Inventaris')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Inventaris</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Input Data Inventaris</h3>
      </div>

      <form method="POST" action="{{ route('admin.inventaris.store') }}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="kode">Kode Inventaris</label>
            <input type="text" name="kode" class="form-control" value="{{ $kode }}" readonly>
          </div>

          <div class="form-group">
            <label for="nama">Nama Inventaris</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
            @error('jumlah') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select name="kondisi" class="form-control" required>
              <option value="Baik">Baik</option>
              <option value="Rusak">Rusak</option>
              <option value="Hilang">Hilang</option>
            </select>
            @error('kondisi') <small class="text-danger">{{ $message }}</small> @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('admin.inventaris.index') }}" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
