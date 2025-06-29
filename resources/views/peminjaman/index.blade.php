@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman as $item)
                <tr>
                    <td>{{ $item->ruangan->nama }}</td>
                    <td>{{ $item->tanggal_pinjam ?? $item->start_time->format('Y-m-d') }}</td>
                    <td>
                        @if(isset($item->jam_mulai))
                            {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
                        @else
                            {{ $item->start_time->format('H:i') }} - {{ $item->end_time->format('H:i') }}
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-{{ $item->status === 'disetujui' ? 'success' : ($item->status === 'ditolak' ? 'danger' : 'warning') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('peminjaman.show', $item->id) }}" class="btn btn-info btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data peminjaman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection