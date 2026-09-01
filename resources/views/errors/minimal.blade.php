<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') - Feed Go</title>

        <link rel="icon" href="{{ asset('images/FeedGo.webp') }}">

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    </head>

    <body class="min-h-screen bg-white flex flex-col">

        <header class="px-8 md:px-10 py-6">
            <a href="{{ route('beranda') }}">
                <img src="{{ asset('images/FeedGo.webp') }}" alt="FeedGo" class="w-auto h-9 md:h-10">
            </a>
        </header>

        <main class="flex-1 flex items-center justify-center px-6 py-10 font-[inter]">

            <div class="w-full max-w-[630px] bg-white shadow-[0_4px_30px_rgba(0,0,0,0.04)] px-8 py-10 md:px-12 md:py-8 text-center">

                @yield('main')

            </div>

        </main>

        <footer class="border-t border-gray-200 px-6 md:px-8 py-6 font-[poppins]">

            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-xs font-semibold text-gray-700">

                <p>
                    ©2026 FeedGo. All rights reserved
                </p>

                <div class="flex items-center gap-8">

                    <a href="{{ route('privacy.policy') }}" class="hover:underline transition">
                        Kebijakan Privasi
                    </a>

                    <a href="{{route ('terms.conditions') }}" class="hover:underline transition">
                        Syarat & Ketentuan
                    </a>

                </div>

            </div>

        </footer>

    </body>

</html>
