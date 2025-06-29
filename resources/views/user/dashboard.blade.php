@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Selamat datang, {{ Auth::user()->name }}!</h1>
    <p class="text-muted">Berikut ini adalah riwayat peminjaman ruangan Anda:</p>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Riwayat Peminjaman</h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Ruangan</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Keperluan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($peminjamans as $peminjaman)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $peminjaman->ruangan->nama ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</td>
                <td>{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</td>
                <td>{{ $peminjaman->keperluan }}</td>
                <td>
                  @if($peminjaman->status === 'pending')
                    <span class="badge badge-warning">Menunggu</span>
                  @elseif($peminjaman->status === 'approved')
                    <span class="badge badge-success">Disetujui</span>
                  @elseif($peminjaman->status === 'rejected')
                    <span class="badge badge-danger">Ditolak</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center">Belum ada data peminjaman.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
