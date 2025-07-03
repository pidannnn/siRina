<x-header></x-header>

<body class="hold-transition sidebar-collapse layout-fixed">
    <div class="wrapper">

        @include('layouts.navbar')

        <!-- Content Wrapper -->
        <div class="content-wrapper" style="height: 100vh;">
            @yield('content')
        </div>

        <footer class="main-footer text-sm text-center">
            <strong>&copy; {{ date('Y') }} SiRina.</strong> All rights reserved.
        </footer>
    </div>

    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    @stack('scripts')
</body>

</html>
