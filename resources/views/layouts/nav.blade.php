<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <span class="text-2xl font-bold text-blue-600">siRina</span>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 px-1">Home</a>
                <a href="{{ route('admin.ruangan.index') }}" class="text-gray-600 hover:text-blue-600 transition">Ruangan</a>
                <a href="{{ route('status.ruangan') }}" class="text-gray-600 hover:text-blue-600 transition">Status Ruangan</a>
                <a href="{{ route('inventaris.index') }}" class="text-gray-600 hover:text-blue-600 transition">Inventaris</a>
                <a href="{{ route('status.inventaris') }}" class="text-gray-600 hover:text-blue-600 transition">Status Inventaris</a>
            </div>

            <!-- Tombol Login -->
            <div>
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Login</a>
            </div>
        </div>
    </div>
</nav>
