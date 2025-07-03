@extends('layouts.app')

@section('title', 'Data Ruangan')

@section('content')
    <div class="container pt-4">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Ruangan</h1>
                    </div>
                </div>
                <a href="{{ route('admin.ruangan.create') }}" class="btn btn-primary mb-3">+ Tambah Ruangan</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gedung</th>
                    <th>Lantai</th>
                    <th>Kapasitas</th>
                    <th>Tipe</th>
                    <th>Fasilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruangans as $ruangan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ruangan->nama }}</td>
                        <td>{{ $ruangan->gedung }}</td>
                        <td>{{ $ruangan->lantai }}</td>
                        <td>{{ $ruangan->kapasitas }}</td>
                        <td>{{ $ruangan->tipe }}</td>
                        <td>
                            @foreach (json_decode($ruangan->fasilitas ?? '[]') as $fas)
                                <span class="badge badge-info">{{ $fas }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.ruangan.edit', $ruangan->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.ruangan.destroy', $ruangan->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
