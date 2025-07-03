<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siRina - Sistem Peminjaman Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        /* Custom breakpoints */
        @media (max-width: 767px) {
            .mobile-stack {
                flex-direction: column;
            }

            .mobile-full-width {
                width: 100% !important;
            }

            .mobile-text-center {
                text-align: center !important;
            }

            .mobile-mt-2 {
                margin-top: 0.5rem !important;
            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .tablet-grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>