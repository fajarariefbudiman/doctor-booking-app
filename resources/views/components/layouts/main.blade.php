<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>


    {{-- Tailwind CSS (compiled) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Sedan+SC&display=swap"
        rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Choices JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .diamond-shape {
            width: 46px;
            height: 46px;
            position: relative;
            transform: rotate(45deg);
            overflow: hidden;
            border-radius: 3px;
        }

        .diamond-image {
            width: 90px;
            height: 90px;
            object-fit: cover;
            transform: rotate(-45deg) scale(1.5) translateY(26%) translateX(5%);
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="w-full min-h-screen">
        {{ $slot }}
    </div>

    {{-- Flatpickr CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Chart JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
