<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengecekan Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen flex items-center justify-center font-sans p-6">

    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-4xl">
        <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">📋 Hasil Pengecekan Ketersediaan Ruangan</h2>

        <div class="mb-4 text-sm text-gray-600 space-y-1">
            <p><span class="font-medium text-gray-700">📅 Tanggal:</span> {{ \Carbon\Carbon::parse($tanggalAwal)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d M Y') }}</p>
            <p><span class="font-medium text-gray-700">🏢 Gedung:</span> {{ $gedung }}</p>
        </div>

        @if (count($hasil) > 0)
        <div class="overflow-x-auto rounded-md border border-gray-200">
            <table class="w-full text-sm">
                <thead class="bg-blue-100 text-blue-700 uppercase text-xs">
                    <tr>
                        <th class="p-3 text-left">Nama Ruangan</th>
                        <th class="p-3 text-left">Lantai</th>
                        <th class="p-3 text-left">Kapasitas</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Tanggal Dipinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $item)
                    @php $ruangan = $item['ruangan'] ?? null; @endphp
                    <tr class="{{ $item['tersedia'] ? 'bg-green-50' : 'bg-red-50' }} border-b border-gray-200">
                        <td class="p-3 font-medium">{{ $ruangan->nama ?? '-' }}</td>
                        <td class="p-3">{{ $ruangan->lantai ?? '-' }}</td>
                        <td class="p-3">{{ $ruangan->kapasitas ?? '-' }} orang</td>
                        <td class="p-3">
                            @if ($item['tersedia'])
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Tersedia</span>
                            @else
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">Sudah Dipinjam</span>
                            @endif
                        </td>
                        <td class="p-3">
                            @if (! $item['tersedia'] && isset($item['peminjaman']) && count($item['peminjaman']) > 0)
                            <ul class="list-disc ml-5 text-gray-700 text-xs space-y-1">
                                @foreach ($item['peminjaman'] as $p)
                                <li>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</li>
                                @endforeach
                            </ul>
                            @else
                            <span class="text-gray-400 text-sm">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="mt-4 text-red-600 text-sm">⚠️ Tidak ada data ruangan ditemukan untuk gedung ini.</p>
        @endif

        <!-- Tombol Navigasi -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mt-6">
            <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline">
                ← Kembali ke Home
            </a>
            <a href="{{ route('cek.ketersediaan.form') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline">
                🔄 Lihat Ruangan Lain
            </a>
        </div>

    </div>

</body>

</html>
