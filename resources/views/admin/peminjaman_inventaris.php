<!-- @extends('layouts.app')

@section('title', 'Peminjaman Inventaris')

@section('content')
<div class="container mt-4">
    <h3>Daftar Peminjaman Inventaris</h3>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama User</th>
                <th>Inventaris</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Jam</th>
                <th>Keperluan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $pinjam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pinjam->user->name }}</td>
                    <td>{{ $pinjam->inventaris_id }}</td> {{-- nanti bisa relasi --}}
                    <td>{{ $pinjam->jumlah_pinjam }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->jam_mulai }} - {{ $pinjam->jam_selesai }}</td>
                    <td>{{ $pinjam->keperluan }}</td>
                    <td>
                        <span class="badge 
                            {{ $pinjam->status == 'pending' ? 'bg-warning' : 
                               ($pinjam->status == 'approved' ? 'bg-success' : 'bg-danger') }}">
                            {{ ucfirst($pinjam->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection -->
