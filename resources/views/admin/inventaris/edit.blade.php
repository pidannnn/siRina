@extends('layouts.app')

@section('title', 'Edit Inventaris')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Inventaris</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Form Edit Data Inventaris</h3>
      </div>

      <form method="POST" action="{{ route('admin.inventaris.update', $inventaris->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">
          <div class="form-group">
            <label for="nama">Nama Inventaris</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $inventaris->nama) }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $inventaris->jumlah) }}" required>
            @error('jumlah') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select name="kondisi" class="form-control" required>
              <option value="baik" {{ old('kondisi', $inventaris->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
              <option value="rusak_ringan" {{ old('kondisi', $inventaris->kondisi) == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
              <option value="rusak_berat" {{ old('kondisi', $inventaris->kondisi) == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
            @error('kondisi') <small class="text-danger">{{ $message }}</small> @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <a href="{{ route('admin.inventaris.index') }}" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
