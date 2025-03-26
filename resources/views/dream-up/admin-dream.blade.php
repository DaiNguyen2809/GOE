<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script src="https://kit.fontawesome.com/393d11b23d.js" crossorigin="anonymous"></script> {{-- fontawesome --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js"></script> {{-- alpine --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> {{-- animate --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- sweetalert --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> {{-- jquery --}}
    <title>@yield('title', 'Trang chủ')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex overflow-auto">
        @include('dream-up.sidebar-dream')
        <div class="bg-zinc-100 w-[83%] 2xl:w-[85%] h-screen  font-gilroy flex flex-col items-center overflow-auto">
            @yield('content')
        </div>
    </div>
</body>
</html>
