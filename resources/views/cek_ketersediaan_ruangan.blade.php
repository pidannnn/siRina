<div class="bg-white rounded-lg shadow p-4 mt-6">
    <h3 class="font-semibold mb-3">Cek Ketersediaan Ruangan</h3>
    <form method="POST" action="{{ route('cek.ketersediaan.cek') }}">
        @csrf
        <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" class="w-full px-3 py-2 border rounded-md" required>
        </div>
        <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" class="w-full px-3 py-2 border rounded-md" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Gedung</label>
            <select name="gedung" class="w-full px-3 py-2 border rounded-md" required>
                <option value="">-- Pilih Gedung --</option>
                @foreach($gedung as $g)
                    <option value="{{ $g }}">{{ $g }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition">
            Cek Ketersediaan
        </button>
    </form>
</div>
