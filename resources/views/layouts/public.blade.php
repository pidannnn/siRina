<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | SiRina</title>

  <!-- Tailwind / Custom CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  @stack('styles')
</head>
<body class="bg-white text-gray-900">
  @include('layouts.navbar') {{-- Navbar Umum --}}

  <main class="min-h-screen">
    @yield('content')
  </main>

  @include('layouts.footer') {{-- Footer Umum --}}
  
  @stack('scripts')
</body>
</html>
