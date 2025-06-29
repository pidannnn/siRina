<div class="bg-white rounded-lg shadow p-4 mt-6">
    <h2 class="text-xl font-semibold mb-3">Hasil Pengecekan Ketersediaan Ruangan</h2>
    <p>Tanggal: {{ $tanggal_awal }} s/d {{ $tanggal_akhir }}</p>
    <p>Gedung: {{ $gedung }}</p>

    @if ($hasil->count() > 0)
        <table class="mt-4 w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Nama Ruangan</th>
                    <th class="p-2 text-left">Lantai</th>
                    <th class="p-2 text-left">Kapasitas</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2 text-left">Tanggal Dipinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil as $item)
                    <tr class="{{ $item['tersedia'] ? 'bg-green-50' : 'bg-red-50' }}">
                        <td class="p-2">{{ $item['ruangan']->nama }}</td>
                        <td class="p-2">{{ $item['ruangan']->lantai }}</td>
                        <td class="p-2">{{ $item['ruangan']->kapasitas }} orang</td>
                        <td class="p-2">
                            @if ($item['tersedia'])
                                <span class="text-green-600 font-semibold">Tersedia</span>
                            @else
                                <span class="text-red-600 font-semibold">Sudah Dipinjam</span>
                            @endif
                        </td>
                        <td class="p-2">
                            @if (! $item['tersedia'])
                                <ul class="list-disc ml-5 text-sm text-gray-700">
                                    @foreach ($item['peminjaman'] as $p)
                                        <li>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-4 text-red-600">Tidak ada data ruangan ditemukan untuk gedung ini.</p>
    @endif

    <a href="{{ route('cek.ketersediaan.form') }}" class="text-blue-600 mt-4 inline-block hover:underline">← Kembali</a>
</div>
