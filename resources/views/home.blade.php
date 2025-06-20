<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siRina - Peminjaman Ruangan & Inventaris</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-indigo-600">siRina</h1>
        <div class="space-x-4">
            <a href="#" class="text-gray-600 hover:text-indigo-600">Beranda</a>
            <a href="#" class="text-gray-600 hover:text-indigo-600">Peminjaman</a>
            <a href="#" class="text-gray-600 hover:text-indigo-600">Login</a>
            <a href="#" class="text-gray-600 hover:text-indigo-600">tentang kami</a>
        </div>
    </nav>
    
    {{-- Hero Section --}}
    <section class="text-center py-20 bg-indigo-600 text-white">
        <h2 class="text-4xl font-bold mb-4">Sistem Peminjaman Ruangan & Inventaris</h2>
        <p class="text-lg mb-6">Mudah, Cepat, dan Terorganisir</p>
        <a href="#" class="bg-white text-indigo-600 font-semibold px-6 py-2 rounded hover:bg-indigo-100 scale-125 transition-transform duration-300 ">Mulai Pinjam</a>
    </section>

    {{-- Fitur --}}
    <section class="py-16 px-4 max-w-6xl mx-auto">
        <h3 class="text-2xl font-bold text-center mb-8">Fitur Unggulan</h3>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white shadow p-6 rounded">
                <h4 class="text-xl font-semibold mb-2">Peminjaman Ruangan</h4>
                <p>Atur dan pinjam ruangan dengan mudah, lihat jadwal ketersediaan secara real-time.</p>
            </div>
            <div class="bg-white shadow p-6 rounded">
                <h4 class="text-xl font-semibold mb-2">Peminjaman Inventaris</h4>
                <p>Lakukan pencatatan peminjaman barang seperti proyektor, laptop, dan lainnya.</p>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-200 text-center py-6 mt-12">
        <p class="text-sm text-gray-600">&copy; 2025 siRina. Sistem Peminjaman STT-NF.</p>
    </footer>

</body>
</html>
