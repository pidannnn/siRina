@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Peminjaman</h5>
            
            <dl class="row">
                <dt class="col-sm-3">Ruangan</dt>
                <dd class="col-sm-9">{{ $peminjaman->ruangan->nama }}</dd>
                
                <dt class="col-sm-3">Tanggal</dt>
                <dd class="col-sm-9">{{ $peminjaman->tanggal_pinjam ?? $peminjaman->start_time->format('Y-m-d') }}</dd>
                
                <dt class="col-sm-3">Waktu</dt>
                <dd class="col-sm-9">
                    @if(isset($peminjaman->jam_mulai))
                        {{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}
                    @else
                        {{ $peminjaman->start_time->format('H:i') }} - {{ $peminjaman->end_time->format('H:i') }}
                    @endif
                </dd>
                
                <!-- Tambahkan detail lainnya sesuai kebutuhan -->
            </dl>
            
            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection