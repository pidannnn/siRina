@extends('layouts.app')

@section('title', 'Detail Peminjaman Ruangan')

@section('content')
<div class="container mt-4">
  <h3>Detail Peminjaman Ruangan</h3>

  <div class="card">
    <div class="card-body">
      <p><strong>Nama Ruangan:</strong> {{ $peminjaman->ruangan->nama ?? '-' }}</p>
      <p><strong>Gedung:</strong> {{ $peminjaman->ruangan->gedung ?? '-' }}</p>
      <p><strong>Peminjam:</strong> {{ $peminjaman->user->name ?? '-' }}</p>
      <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</p>
      <p><strong>Jam:</strong> {{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</p>
      <p><strong>Keperluan:</strong> {{ $peminjaman->keperluan }}</p>
      <p><strong>Status:</strong> 
        @if($peminjaman->status == 'pending')
          <span class="badge badge-warning">Menunggu</span>
        @elseif($peminjaman->status == 'approved')
          <span class="badge badge-success">Disetujui</span>
        @elseif($peminjaman->status == 'rejected')@extends('layouts.app')

@section('title', 'Detail Peminjaman Ruangan')

@section('content')
<div class="container mt-4">
  <h3>Detail Peminjaman Ruangan</h3>

  <div class="card">
    <div class="card-body">
      <p><strong>Nama Ruangan:</strong> {{ $peminjaman->ruangan->nama ?? '-' }}</p>
      <p><strong>Gedung:</strong> {{ $peminjaman->ruangan->gedung ?? '-' }}</p>
      <p><strong>Peminjam:</strong> {{ $peminjaman->user->name ?? '-' }}</p>
      <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</p>
      <p><strong>Jam:</strong> {{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</p>
      <p><strong>Keperluan:</strong> {{ $peminjaman->keperluan }}</p>
      <p><strong>Status:</strong> 
        @if($peminjaman->status == 'pending')
          <span class="badge badge-warning">Menunggu</span>
        @elseif($peminjaman->status == 'approved')
          <span class="badge badge-success">Disetujui</span>
        @elseif($peminjaman->status == 'rejected')
          <span class="badge badge-danger">Ditolak</span>
        @endif
      </p>
    </div>
  </div>
</div>
@endsection

          <span class="badge badge-danger">Ditolak</span>
        @endif
      </p>
    </div>
  </div>
</div>
@endsection
