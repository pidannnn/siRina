@extends('layouts.app')

@section('title', 'Edit Ruangan')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Ruangan</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Form Edit Data Ruangan</h3>
      </div>

      <form method="POST" action="{{ route('admin.ruangan.update', $ruangan->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">
          <div class="form-group">
            <label for="nama">Nama Ruangan</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $ruangan->nama) }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="gedung">Gedung</label>
            <input type="text" name="gedung" class="form-control" value="{{ old('gedung', $ruangan->gedung) }}" required>
            @error('gedung') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="lantai">Lantai</label>
            <input type="number" name="lantai" class="form-control" value="{{ old('lantai', $ruangan->lantai) }}" required>
            @error('lantai') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $ruangan->kapasitas) }}" required>
            @error('kapasitas') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="tipe">Tipe Ruangan</label>
            <input type="text" name="tipe" class="form-control" value="{{ old('tipe', $ruangan->tipe) }}" required>
            @error('tipe') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="fasilitas">Fasilitas (pisahkan dengan koma)</label>
            <input type="text" name="fasilitas" class="form-control"
                   value="{{ old('fasilitas', is_array(json_decode($ruangan->fasilitas)) ? implode(', ', json_decode($ruangan->fasilitas)) : '') }}">
            @error('fasilitas') <small class="text-danger">{{ $message }}</small> @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <a href="{{ route('admin.ruangan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
