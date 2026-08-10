<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    @livewireStyles
</head>
<body class="flex flex-col min-h-screen bg-[#F5F5F5]  mx-auto font-[Poppins]">

    @include('components.header')
    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer')

    @livewireScripts
<div
    x-data="{
        show:false,
        type:'success',
        title:'',
        message:''
    }"

    x-on:toast.window="
        type = $event.detail[0].type;
        title = $event.detail[0].title;
        message = $event.detail[0].message;

        show = true;

        setTimeout(() => {
            show = false;
        },3000);
    "

    x-show="show"

    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-5 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"

    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"

    class="fixed top-6 left-6 z-[9999]"
>

    <div
        class="rounded-2xl shadow-2xl p-5 w-[380px] text-white"

        :class="type == 'success'
            ? 'bg-[#2E7D32]'
            : 'bg-[#E53935]'">

        <div class="flex items-start gap-4">

            <div class="mt-1">

                <template x-if="type=='success'">

                    <svg class="w-7 h-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M5 13l4 4L19 7"/>

                    </svg>

                </template>

                <template x-if="type=='error'">

                    <svg class="w-7 h-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </template>

            </div>

            <div>

                <h4
                    class="font-bold text-lg"
                    x-text="title">
                </h4>

                <p
                    class="text-sm mt-1 opacity-90"
                    x-text="message">
                </p>

            </div>

        </div>

    </div>

</div>
</body>
</html>
