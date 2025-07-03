    <nav class="sticky top-0 z-50 bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="/">
                    <div class="flex-shrink-0 flex items-center space-x-2">
                        <div class="h-12 w-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="text-white font-bold text-2xl">siRina</span>
                        <span class="text-blue-200 text-sm hidden md:block">Room & Inventory Booking System</span>
                    </div>
                </a>

                <div class="hidden md:flex items-center space-x-4">
                    <div class="flex space-x-1">
                        @auth
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            @if (Auth::user()->role === 'admin')
                                {{-- Navbar for admin --}}
                                <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->is('admin/dashboard')">Dashboard</x-nav-link>
                                <x-nav-link href="{{ route('admin.ruangan.index') }}" :active="request()->is('admin/ruangan')">Data
                                    Ruangan</x-nav-link>
                                <x-nav-link href="{{ route('admin.inventaris.index') }}" :active="request()->is('admin/inventaris')">Data
                                    Inventaris</x-nav-link>
                                <x-nav-link href="{{ route('admin.peminjaman.index') }}" :active="request()->is('admin/peminjaman')">Peminjaman
                                    Ruangan</x-nav-link>
                                <x-nav-link href="{{ route('admin.peminjaman_inventaris.index') }}"
                                    :active="request()->is('admin/peminjaman/inventaris')">Peminjaman Inventaris</x-nav-link>
                            @elseif(Auth::user()->role === 'petugas')
                                {{-- Include sidebar for petugas --}}
                            @else
                                {{-- Navbar for user --}}
                                <x-nav-link href="{{ route('user.dashboard') }}" :active="request()->is('user/dashboard')">Dashboard</x-nav-link>
                                <x-nav-link href="{{ route('user.peminjaman.ruangan') }}" :active="request()->is('user/peminjaman/ruangan')">Peminjaman
                                    Ruangan</x-nav-link>
                                <x-nav-link href="{{ route('user.peminjaman.inventaris') }}" :active="request()->is('user/peminjaman/inventaris')">Peminjaman
                                    Inventaris</x-nav-link>
                            @endif

                            <div class="">
                                <a class="nav-link text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endauth
                    </div>

                    @guest
                        <div class="ml-4 flex space-x-3">
                            <a href="{{ route('login') }}"
                                class="text-blue-700 bg-white hover:bg-gray-100 px-5 py-2 rounded-lg text-sm font-medium transition duration-300 shadow-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                                class="text-white bg-blue-500 hover:bg-blue-400 px-5 py-2 rounded-lg text-sm font-medium transition duration-300 shadow-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                Register
                            </a>
                        </div>
                    @endguest
                </div>

                <div class="md:hidden flex items-center">
                    <button type="button" class="text-white hover:text-gray-200 focus:outline-none"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
                <a href="/"
                    class="text-white block px-3 py-3 rounded-lg text-base font-medium bg-blue-900 bg-opacity-30">Home</a>
                <a href="#"
                    class="text-blue-100 hover:text-white block px-3 py-3 rounded-lg text-base font-medium hover:bg-blue-700 transition">Ruangan</a>
                <a href="#"
                    class="text-blue-100 hover:text-white block px-3 py-3 rounded-lg text-base font-medium hover:bg-blue-700 transition">Status</a>
                <a href="#"
                    class="text-blue-100 hover:text-white block px-3 py-3 rounded-lg text-base font-medium hover:bg-blue-700 transition">Inventaris</a>
                <div class="border-t border-blue-800 pt-3 mt-2 space-y-2">
                    <a href="{{ route('login') }}"
                        class="text-blue-700 bg-white hover:bg-gray-100 block px-3 py-3 rounded-lg text-base font-medium text-center transition duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="text-white bg-blue-500 hover:bg-blue-400 block px-3 py-3 rounded-lg text-base font-medium text-center transition duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Register
                    </a>
                </div>
            </div>
        </div> --}}
    </nav>

    {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav ml-auto">
    @auth
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="{{ route('logout') }}" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    @endauth

    @guest
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> Guest</a>
      </li>
    @endguest
  </ul>
</nav> --}}
