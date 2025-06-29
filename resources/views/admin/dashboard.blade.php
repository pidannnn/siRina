@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard </h1>
      </div>
    </div>
    <p class="text-muted">Selamat datang, {{ Auth::user()->name }}!</p>
  </div>
</div>

<!-- Main Content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- Card Pengguna -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $data['userCount'] }}</h3>
            <p>Pengguna</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="{{ route('admin.users.index') }}" class="small-box-footer">
            Lihat detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Card Inventaris -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $data['inventarisCount'] }}</h3>
            <p>Inventaris</p>
          </div>
          <div class="icon">
            <i class="fas fa-box-open"></i>
          </div>
          <a href="{{ route('admin.inventaris.index') }}" class="small-box-footer">
            Lihat detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Card Ruangan -->
      <!--  -->
    </div>
  </div>
</div>
@endsection