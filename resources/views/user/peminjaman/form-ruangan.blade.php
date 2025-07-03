@extends('layouts.app')

@section('title', 'Peminjaman Ruangan')

@section('content')
<div class="container pt-4">
  <h3>Form Peminjaman Ruangan</h3>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

<form action="{{ route('user.peminjaman.ruangan.store') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="ruangan_id">Ruangan</label>
      <select name="ruangan_id" class="form-control" required>
        <option value="">-- Pilih Ruangan --</option>
        @foreach($ruangan as $r)
          <option value="{{ $r->id }}" {{ old('ruangan_id') == $r->id ? 'selected' : '' }}>
            {{ $r->nama }}
          </option>
        @endforeach
      </select>
      @error('ruangan_id')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="tanggal_pinjam">Tanggal</label>
      <input type="date" name="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam') }}" required>
      @error('tanggal_pinjam')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="jam_mulai">Jam Mulai</label>
      <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai') }}" required>
      @error('jam_mulai')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="jam_selesai">Jam Selesai</label>
      <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai') }}" required>
      @error('jam_selesai')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="keperluan">Keperluan</label>
      <textarea name="keperluan" class="form-control" required>{{ old('keperluan') }}</textarea>
      @error('keperluan')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
  </form>
</div>
@endsection
