@extends('layouts.app')

@section('title', 'Peminjaman Inventaris')

@section('content')
<div class="container mt-4">
  <h3>Form Peminjaman Inventaris</h3>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('user.peminjaman.inventaris.store') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="inventaris_id">Pilih Inventaris</label>
      <select name="inventaris_id" class="form-control" required>
        <option value="">-- Pilih Inventaris --</option>
        @foreach($inventaris as $item)
          <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="jumlah_pinjam">Jumlah</label>
      <input type="number" name="jumlah_pinjam" class="form-control" min="1" required>
    </div>

    <div class="form-group">
      <label for="tanggal_pinjam">Tanggal</label>
      <input type="date" name="tanggal_pinjam" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="jam_mulai">Jam Mulai</label>
      <input type="time" name="jam_mulai" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="jam_selesai">Jam Selesai</label>
      <input type="time" name="jam_selesai" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="keperluan">Keperluan</label>
      <textarea name="keperluan" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
  </form>
</div>
@endsection
