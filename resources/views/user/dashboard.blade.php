@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Selamat datang, {{ Auth::user()->name }}!</h1>
    <p class="text-muted">Berikut ini adalah riwayat peminjaman ruangan dan inventaris Anda:</p>
  </div>
</div>

<div class="content">
  <div class="container-fluid">

    {{-- Riwayat Peminjaman Ruangan --}}
    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title">Riwayat Peminjaman Ruangan</h3>
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
                <td colspan="6" class="text-center">Belum ada data peminjaman ruangan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    {{-- Riwayat Peminjaman Inventaris --}}
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Riwayat Peminjaman Inventaris</h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Inventaris</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Jumlah</th>
              <th>Keperluan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($riwayatInventaris as $inventaris)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $inventaris->inventaris->nama ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($inventaris->tanggal_pinjam)->format('d M Y') }}</td>
                <td>{{ $inventaris->jam_mulai }} - {{ $inventaris->jam_selesai }}</td>
                <td>{{ $inventaris->jumlah }}</td>
                <td>{{ $inventaris->keperluan }}</td>
                <td>
                  @if($inventaris->status === 'menunggu')
                    <span class="badge badge-warning">Menunggu</span>
                  @elseif($inventaris->status === 'approved' || $inventaris->status === 'disetujui')
                    <span class="badge badge-success">Disetujui</span>
                  @elseif($inventaris->status === 'rejected' || $inventaris->status === 'ditolak')
                    <span class="badge badge-danger">Ditolak</span>
                  @elseif($inventaris->status === 'selesai')
                    <span class="badge badge-secondary">Selesai</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center">Belum ada data peminjaman inventaris.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
@endsection
