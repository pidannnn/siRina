@extends('layouts.app')

@section('title', 'Tambah Ruangan')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Ruangan</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Input Data Ruangan</h3>
      </div>

      <form method="POST" action="{{ route('admin.ruangan.store') }}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="nama">Nama Ruangan</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="gedung">Gedung</label>
            <input type="text" name="gedung" class="form-control" value="{{ old('gedung') }}" required>
            @error('gedung') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="lantai">Lantai</label>
            <input type="number" name="lantai" class="form-control" value="{{ old('lantai') }}" required>
            @error('lantai') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas') }}" required>
            @error('kapasitas') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="tipe">Tipe Ruangan</label>
            <input type="text" name="tipe" class="form-control" value="{{ old('tipe') }}" required>
            @error('tipe') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="fasilitas">Fasilitas (pisahkan dengan koma)</label>
            <input type="text" name="fasilitas" class="form-control" value="{{ old('fasilitas') }}" placeholder="AC, Proyektor, WiFi">
            @error('fasilitas') <small class="text-danger">{{ $message }}</small> @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('admin.ruangan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
