@extends('layouts.app')

@section('title', 'Peminjaman Ruangan')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Data Peminjaman Ruangan</h1>
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
              <th>Nama Ruangan</th>
              <th>Peminjam</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Keperluan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!-- <tbody>
            @forelse($peminjamans as $peminjaman)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $peminjaman->ruangan->nama ?? '-' }}</td>
                <td>{{ $peminjaman->user->name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</td>
                <td>{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</td>
                <td>{{ $peminjaman->keperluan }}</td>
                <td>
                  @if($peminjaman->status == 'pending')
                    <span class="badge bg-warning text-dark">Menunggu</span>
                  @elseif($peminjaman->status == 'approved')
                    <span class="badge bg-success">Disetujui</span>
                  @elseif($peminjaman->status == 'rejected')
                    <span class="badge bg-danger">Ditolak</span>
                  @endif
                </td>
                      <td>
                    <div class="d-flex align-items-center">
                      @if($peminjaman->status == 'pending')
                        <form action="{{ route('admin.peminjaman.approve', $peminjaman->id) }}" method="POST" style="margin-right: 5px;">
                          @csrf
                          @method('PATCH')
                          <button type="submit" class="btn btn-sm btn-success rounded" title="Setujui" onclick="return confirm('Setujui peminjaman ini?')">
                            <i class="fas fa-check"></i>
                          </button>
                        </form>

                        <form action="{{ route('admin.peminjaman.reject', $peminjaman->id) }}" method="POST" style="margin-right: 5px;">
                          @csrf
                          @method('PATCH')
                          <button type="submit" class="btn btn-sm btn-danger rounded" title="Tolak" onclick="return confirm('Tolak peminjaman ini?')">
                            <i class="fas fa-times"></i>
                          </button>
                        </form>
                      @endif

                      <a href="{{ route('admin.peminjaman.show', $peminjaman->id) }}" class="btn btn-sm btn-info rounded" title="Lihat Detail">
                        <i class="fas fa-search"></i>
                      </a>
                    </div>
                  </td>

              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center">Belum ada data peminjaman.</td>
              </tr>
            @endforelse
          </tbody> -->
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
