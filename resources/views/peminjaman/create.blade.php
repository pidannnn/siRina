@extends('layouts.app')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Form Peminjaman</h1>
    <form method="POST" action="{{ route('peminjaman.store') }}">
        @csrf
        <!-- Form fields here -->
    </form>
</div>
@endsection