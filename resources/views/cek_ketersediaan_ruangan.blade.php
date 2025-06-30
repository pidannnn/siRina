<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Ketersediaan Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-semibold text-blue-700 mb-6 text-center">📋 Cek Ketersediaan Ruangan</h1>

        <form id="cekKetersediaanForm" method="POST" action="{{ route('cek.ketersediaan.cek') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Gedung</label>
                <select name="gedung" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    <option value="">-- Pilih Gedung --</option>
                    @foreach ($gedung as $g)
                        <option value="{{ $g }}">{{ $g }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                🔍 Cek Ketersediaan
            </button>
        </form>
    </div>

</body>
</html>


<!-- Modal Structure -->
<div id="hasilModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Hasil Ketersediaan Ruangan</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="modalContent">
                <!-- Konten hasil akan dimuat di sini via AJAX -->
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle form submission
        $('#cekKetersediaanForm').on('submit', function(e) {
            e.preventDefault();

            // Show loading state
            $('button[type="submit"]').html(`
            <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Memproses...
        `).prop('disabled', true);

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#modalContent').html(response.html);
                    $('#hasilModal').removeClass('hidden').addClass('flex');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                },
                complete: function() {
                    $('button[type="submit"]').html('Cek Ketersediaan').prop('disabled', false);
                }
            });
        });

        // Close modal handler
        $('#closeModal').on('click', function() {
            $('#hasilModal').removeClass('flex').addClass('hidden');
        });

        // Close modal when clicking outside
        $(document).on('click', function(e) {
            if ($(e.target).attr('id') === 'hasilModal') {
                $('#hasilModal').removeClass('flex').addClass('hidden');
            }
        });
    });
</script>
@endpush