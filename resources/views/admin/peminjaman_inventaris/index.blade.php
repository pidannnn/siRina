@extends('layouts.app')

@section('title', 'Peminjaman Inventaris')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Data Peminjaman Inventaris</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Peminjaman</h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Inventaris</th>
              <th>Peminjam</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Jumlah</th>
              <th>Keperluan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($peminjamans as $peminjaman)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $peminjaman->inventaris->nama ?? '-' }}</td>
              <td>{{ $peminjaman->user->name ?? '-' }}</td>
              <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</td>
              <td>{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</td>
              <td>{{ $peminjaman->jumlah }}</td>
              <td>{{ $peminjaman->keperluan }}</td>
              <td>
                @if($peminjaman->status == 'menunggu')
                  <span class="badge bg-warning text-dark">Menunggu</span>
                @elseif($peminjaman->status == 'disetujui')
                  <span class="badge bg-success">Disetujui</span>
                @elseif($peminjaman->status == 'ditolak')
                  <span class="badge bg-danger">Ditolak</span>
                @elseif($peminjaman->status == 'selesai')
                  <span class="badge bg-secondary">Selesai</span>
                @else
                  <span class="badge bg-light text-dark">{{ ucfirst($peminjaman->status) }}</span>
                @endif
              </td>
              <td>
                @if($peminjaman->status == 'menunggu')
                <div class="d-flex align-items-center gap-1">
                  <form action="{{ route('admin.peminjaman_inventaris.approve', $peminjaman->id) }}" method="POST" style="margin-right: 5px;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Setujui peminjaman ini?')">✔</button>
                  </form>

                  <form action="{{ route('admin.peminjaman_inventaris.reject', $peminjaman->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tolak peminjaman ini?')">✖</button>
                  </form>
                </div>
                @else
                <span class="text-muted">-</span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="9" class="text-center">Belum ada data peminjaman.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
