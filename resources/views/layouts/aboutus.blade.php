@extends('app')

@section('title', 'Tentang kami')

@section('content')

@section('header-content')
<div class="relative w-full h-[400px] overflow-hidden">

    <img
        src="{{ asset('images/Sawah.webp') }}"
        alt="image"
        class="absolute inset-0 w-full h-full object-cover blur-sm"
    >

    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-center px-4">

        <h1 class="text-3xl md:text-4xl font-semibold text-white text-shadow-lg drop-shadow-lg">
            Tentang Kami FeedGo
        </h1>

        <h2 class="text-white text-sm font-light">
            Inovasi Pakan Berbasis Riset untuk Masa Depan Agrikultur Indonesia
        </h2>

    </div>

</div>
@endsection
<section class="max-w-6xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-20 relative z-20 p-10 text-center">

    <div class="grid md:grid-cols-2 grid-cols-1 gap-5 items-center">

        <div class="flex flex-col justify-center p-5">
            <p class="text-[#2D5016] text-left text-lg font-semibold">
                FeedGo hadir untuk membantu peternak meningkatkan produktivitas melalui pakan berkualitas tinggi, formulasi terukur, dan bahan baku lokal terverifikasi.
            </p>
            <div class="flex items-center gap-10 mt-5 text-[#2D5016] font-semibold">
                <div class="flex gap-2 items-center font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="30" viewBox="0 0 36 40" fill="none">
                        <path d="M6 40C4.4087 40 2.88258 39.3679 1.75736 38.2426C0.632141 37.1174 0 35.5913 0 34C0 32.8 0.36 31.68 1 30.74L12 11.62V8C11.4696 8 10.9609 7.78929 10.5858 7.41421C10.2107 7.03914 10 6.53043 10 6V4C10 2.93913 10.4214 1.92172 11.1716 1.17157C11.9217 0.421427 12.9391 0 14 0H22C23.0609 0 24.0783 0.421427 24.8284 1.17157C25.5786 1.92172 26 2.93913 26 4V6C26 6.53043 25.7893 7.03914 25.4142 7.41421C25.0391 7.78929 24.5304 8 24 8V11.62L35 30.74C35.64 31.68 36 32.8 36 34C36 35.5913 35.3679 37.1174 34.2426 38.2426C33.1174 39.3679 31.5913 40 30 40H6ZM4 34C4 34.5304 4.21071 35.0391 4.58579 35.4142C4.96086 35.7893 5.46957 36 6 36H30C30.5304 36 31.0391 35.7893 31.4142 35.4142C31.7893 35.0391 32 34.5304 32 34C32 33.58 31.86 33.18 31.64 32.86L27.06 24.94L22 30L11.86 19.86L4.36 32.86C4.14 33.18 4 33.58 4 34ZM20 16C19.4696 16 18.9609 16.2107 18.5858 16.5858C18.2107 16.9609 18 17.4696 18 18C18 18.5304 18.2107 19.0391 18.5858 19.4142C18.9609 19.7893 19.4696 20 20 20C20.5304 20 21.0391 19.7893 21.4142 19.4142C21.7893 19.0391 22 18.5304 22 18C22 17.4696 21.7893 16.9609 21.4142 16.5858C21.0391 16.2107 20.5304 16 20 16Z" fill="#EAAA00"/>
                    </svg>
                    <span class="text-xl">Riset</span>
                </div>
                <div class="flex gap-2 items-center font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="30" viewBox="0 0 40 37" fill="none">
                        <path d="M0 36.1219V32.1219C0 32.1219 10 28.1219 20 28.1219C30 28.1219 40 32.1219 40 32.1219V36.1219H0ZM18.6 10.3219C16.2 2.52193 4 4.32193 4 4.32193C4 4.32193 4.4 19.9219 15.8 17.5219C15 11.7219 12 10.1219 12 10.1219C17.6 10.1219 18 16.9219 18 16.9219V26.1219H22V17.7219C22 17.7219 22 9.92193 28 7.92193C28 7.92193 24 13.9219 24 17.9219C38 19.3219 38 0.121932 38 0.121932C38 0.121932 20.2 -1.87807 18.6 10.3219Z" fill="#EAAA00"/>
                    </svg>
                    <span class="text-xl">Lokal</span>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="flex bg-[#EAAA00] items-center rounded-lg text-white mt-6 px-4 py-2 font-semibold w-fit hover:bg-[#FFC11E] hover:scale-105 active:scale-95 transition shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                    <path d="M14.2562 5.40868C13.3506 4.12618 12.0966 3.54826 10.7666 3.56251C9.50464 3.57518 8.27597 4.1151 7.24997 4.83393C6.20348 5.57069 5.31115 6.50497 4.62322 7.58418C3.97405 8.61176 3.50539 9.82618 3.56872 11.0121C3.8743 16.7168 7.08372 22.8127 11.5915 27.3236C16.0961 31.8298 22.1111 34.9616 28.1848 34.3631C29.3755 34.2459 30.5012 33.6395 31.4211 32.8668C32.3726 32.0609 33.15 31.0697 33.7059 29.9535C34.2442 28.8578 34.5656 27.5943 34.3883 26.3641C34.2046 25.0816 33.4874 23.9353 32.1685 23.1753C31.8952 23.0167 31.6249 22.8531 31.3578 22.6844C31.1203 22.5372 30.867 22.3773 30.5598 22.1936C29.9324 21.8068 29.2704 21.4792 28.5822 21.2151C27.8745 20.957 27.0654 20.7876 26.2231 20.9032C25.3506 21.0235 24.54 21.4352 23.8386 22.173C23.2986 22.743 22.5038 22.9203 21.386 22.5973C20.2491 22.268 18.9698 21.451 17.8583 20.3458C16.7468 19.2438 15.9061 17.955 15.5466 16.7913C15.192 15.6386 15.3487 14.7915 15.9029 14.2073C16.6518 13.4188 17.0508 12.5416 17.1347 11.6138C17.2171 10.7113 16.9922 9.8626 16.6708 9.1216C16.1895 8.01485 15.3725 6.91443 14.7328 6.05626C14.572 5.84171 14.4136 5.62531 14.2578 5.4071" fill="white"/>
                </svg>
                Hubungi Kami
            </a>
        </div>

        <div class="flex justify-center">
            <img src="{{ asset('images/Tentang1.webp') }}" alt="Tentang Kami" class="w-full h-auto rounded-lg shadow-lg">
        </div>

    </div>

    <div class="mt-20">
        <div class="mx-auto text-center">
            <h2 class="text-2xl font-medium text-[#2E7D32] mb-6">
                Tentang FeedGo
            </h2>

            <p class="text-gray-600 text-left leading-relaxed mb-4">
                FeedGo adalah startup berbasis riset Universitas Hasanuddin yang resmi
                diluncurkan pada 5 Mei 2025. Pengembangan produk berfokus pada pakan
                udang dan pakan kambing karena telah memiliki dasar penelitian dosen
                Unhas sehingga formulasi nutrisinya lebih teruji.
            </p>

            <p class="text-gray-600 text-left leading-relaxed">
                Berlokasi di Unhas Barru, Kabupaten Barru, Sulawesi Selatan, FeedGo
                memastikan setiap produk melalui uji laboratorium dan evaluasi
                lapangan untuk menghasilkan pakan yang aman, konsisten, dan dapat
                dipercaya oleh peternak.
            </p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 mt-20">
        <h2 class="text-2xl font-medium text-[#2E7D32] mb-6">
            Misi Kami
        </h2>

        <div class="grid md:grid-cols-2 grid-cols-1 gap-10 items-center">
            <div class="flex justify-center">
                <img
                    src="{{ asset('images/Tentang2.webp') }}"
                    alt="Misi Kami"
                    class="w-full max-w-lg rounded-2xl shadow-lg object-cover"
                >
            </div>

            <div class="space-y-6 max-w-xl">
                <p class="text-[#6B7280] leading-relaxed">
                    Menjadi solusi pakan ternak berbasis riset yang mudah diakses dan
                    mendorong keberlanjutan peternakan di Indonesia.
                </p>

                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <x-svg.check-list-icon />
                        <p class="text-[#2E7D32] text-start font-medium">
                            Menghadirkan pakan berkualitas hasil riset ilmiah.
                        </p>
                    </li>

                    <li class="flex items-start gap-3">
                        <x-svg.check-list-icon />
                        <p class="text-[#2E7D32] text-start font-medium">
                            Memanfaatkan bahan baku lokal yang aman dan terstandar.
                        </p>
                    </li>

                    <li class="flex items-start gap-3">
                        <x-svg.check-list-icon />
                        <p class="text-[#2E7D32] text-start font-medium">
                            Mendukung peningkatan produktivitas dan kesehatan ternak.
                        </p>
                    </li>

                    <li class="flex items-start gap-3">
                        <x-svg.check-list-icon />
                        <p class="text-[#2E7D32] text-start font-medium">
                            Memberdayakan peternak melalui edukasi dan pendampingan.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-20">

        <h2 class="text-center text-2xl font-medium text-[#2E7D32] mb-12">
            Pilar keunggulan kami
        </h2>

        <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-xl border p-6 text-center shadow-sm">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="40" viewBox="0 0 36 40" fill="none">
                        <path d="M6 40C4.4087 40 2.88258 39.3679 1.75736 38.2426C0.632141 37.1174 0 35.5913 0 34C0 32.8 0.36 31.68 1 30.74L12 11.62V8C11.4696 8 10.9609 7.78929 10.5858 7.41421C10.2107 7.03914 10 6.53043 10 6V4C10 2.93913 10.4214 1.92172 11.1716 1.17157C11.9217 0.421427 12.9391 0 14 0H22C23.0609 0 24.0783 0.421427 24.8284 1.17157C25.5786 1.92172 26 2.93913 26 4V6C26 6.53043 25.7893 7.03914 25.4142 7.41421C25.0391 7.78929 24.5304 8 24 8V11.62L35 30.74C35.64 31.68 36 32.8 36 34C36 35.5913 35.3679 37.1174 34.2426 38.2426C33.1174 39.3679 31.5913 40 30 40H6ZM4 34C4 34.5304 4.21071 35.0391 4.58579 35.4142C4.96086 35.7893 5.46957 36 6 36H30C30.5304 36 31.0391 35.7893 31.4142 35.4142C31.7893 35.0391 32 34.5304 32 34C32 33.58 31.86 33.18 31.64 32.86L27.06 24.94L22 30L11.86 19.86L4.36 32.86C4.14 33.18 4 33.58 4 34ZM20 16C19.4696 16 18.9609 16.2107 18.5858 16.5858C18.2107 16.9609 18 17.4696 18 18C18 18.5304 18.2107 19.0391 18.5858 19.4142C18.9609 19.7893 19.4696 20 20 20C20.5304 20 21.0391 19.7893 21.4142 19.4142C21.7893 19.0391 22 18.5304 22 18C22 17.4696 21.7893 16.9609 21.4142 16.5858C21.0391 16.2107 20.5304 16 20 16Z" fill="#2563EB"/>
                    </svg>
                    <h3 class="text-3xl text-[#1F2937] font-semibold mb-3">Riset</h3>
                </div>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>“Diformulasikan berdasarkan riset nutrisi dan uji laboratorium.”</li>
                    <li>“Pakan dirancang dengan pendekatan ilmiah.”</li>
                    <li>“Nutrisi terukur hasil analisis laboratorium.”</li>
                </ul>
            </div>

            <div class="bg-white rounded-xl border p-6 text-center shadow-sm">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48" fill="none">
                        <path d="M4 42.1219V38.1219C4 38.1219 14 34.1219 24 34.1219C34 34.1219 44 38.1219 44 38.1219V42.1219H4ZM22.6 16.3219C20.2 8.52193 8 10.3219 8 10.3219C8 10.3219 8.4 25.9219 19.8 23.5219C19 17.7219 16 16.1219 16 16.1219C21.6 16.1219 22 22.9219 22 22.9219V32.1219H26V23.7219C26 23.7219 26 15.9219 32 13.9219C32 13.9219 28 19.9219 28 23.9219C42 25.3219 42 6.12193 42 6.12193C42 6.12193 24.2 4.12193 22.6 16.3219Z" fill="#2D5016"/>
                    </svg>
                    <h3 class="text-3xl text-[#1F2937] font-semibold mb-3">Lokal</h3>
                </div>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>“Berbahan baku terbaik dari petani lokal.”</li>
                    <li>“Menjamin kualitas, ketersediaan, dan kesegaran.”</li>
                    <li>“Mendukung rantai pasok lokal berkelanjutan.”</li>
                </ul>
            </div>

            <div class="bg-white rounded-xl border p-6 text-center shadow-sm">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48" fill="none">
                        <path d="M11.0501 32.35L18.1501 25.25C18.5501 24.85 19.0168 24.658 19.5501 24.674C20.0834 24.69 20.5501 24.8987 20.9501 25.3C21.3168 25.7 21.5001 26.1667 21.5001 26.7C21.5001 27.2334 21.3168 27.7 20.9501 28.1L12.5001 36.6C12.1001 37 11.6334 37.2 11.1001 37.2C10.5668 37.2 10.1001 37 9.7001 36.6L5.4001 32.3C5.03343 31.9334 4.8501 31.4667 4.8501 30.9C4.8501 30.3334 5.03343 29.8667 5.4001 29.5C5.76676 29.1334 6.23343 28.95 6.8001 28.95C7.36676 28.95 7.83343 29.1334 8.2001 29.5L11.0501 32.35ZM11.0501 16.35L18.1501 9.25002C18.5501 8.85002 19.0168 8.65802 19.5501 8.67402C20.0834 8.69002 20.5501 8.89869 20.9501 9.30002C21.3168 9.70002 21.5001 10.1667 21.5001 10.7C21.5001 11.2334 21.3168 11.7 20.9501 12.1L12.5001 20.6C12.1001 21 11.6334 21.2 11.1001 21.2C10.5668 21.2 10.1001 21 9.7001 20.6L5.4001 16.3C5.03343 15.9334 4.8501 15.4667 4.8501 14.9C4.8501 14.3334 5.03343 13.8667 5.4001 13.5C5.76676 13.1334 6.23343 12.95 6.8001 12.95C7.36676 12.95 7.83343 13.1334 8.2001 13.5L11.0501 16.35ZM28.0001 34C27.4334 34 26.9588 33.808 26.5761 33.424C26.1934 33.04 26.0014 32.5654 26.0001 32C25.9988 31.4347 26.1908 30.96 26.5761 30.576C26.9614 30.192 27.4361 30 28.0001 30H42.0001C42.5668 30 43.0421 30.192 43.4261 30.576C43.8101 30.96 44.0014 31.4347 44.0001 32C43.9988 32.5654 43.8068 33.0407 43.4241 33.426C43.0414 33.8114 42.5668 34.0027 42.0001 34H28.0001ZM28.0001 18C27.4334 18 26.9588 17.808 26.5761 17.424C26.1934 17.04 26.0014 16.5654 26.0001 16C25.9988 15.4347 26.1908 14.96 26.5761 14.576C26.9614 14.192 27.4361 14 28.0001 14H42.0001C42.5668 14 43.0421 14.192 43.4261 14.576C43.8101 14.96 44.0014 15.4347 44.0001 16C43.9988 16.5654 43.8068 17.0407 43.4241 17.426C43.0414 17.8114 42.5668 18.0027 42.0001 18H28.0001Z" fill="#EAAA00"/>
                    </svg>
                    <h3 class="text-3xl text-[#1F2937] font-semibold mb-3">Efisien</h3>
                </div>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>“Optimal untuk pertumbuhan ternak berbagai jenis.”</li>
                    <li>“Lebih hemat dengan nutrisi yang tepat sasaran.”</li>
                    <li>“Mengurangi pemborosan dalam proses pemberian pakan.”</li>
                </ul>
            </div>
        </div>

        <div class="mx-auto flex justify-center gap-6 flex-wrap mt-10">

            <div class="bg-white rounded-xl border p-6 text-center shadow-sm w-full sm:w-[48%] lg:w-[32%]">
                <div class="flex justify-center mb-4 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48" fill="none">
                        <path d="M39.1219 24.198L42.1859 29.5C42.8005 30.5644 43.1239 31.7719 43.1237 33.001C43.1236 34.23 42.7998 35.4374 42.185 36.5017C41.5701 37.5659 40.6859 38.4495 39.6213 39.0636C38.5566 39.6777 37.349 40.0007 36.1199 40H31.9999V44L21.9999 37L31.9999 30V34H36.1239C36.2841 34 36.442 33.9615 36.5843 33.8878C36.7265 33.8141 36.849 33.7072 36.9413 33.5763C37.0337 33.4453 37.0932 33.2941 37.1149 33.1353C37.1365 32.9766 37.1198 32.8149 37.0659 32.664L36.9899 32.5L33.9299 27.196L39.1219 24.198ZM15.4719 18.768L16.5339 30.928L13.0719 28.928L11.0079 32.5C10.9277 32.6388 10.8821 32.7948 10.8748 32.9549C10.8675 33.115 10.8988 33.2745 10.9661 33.4199C11.0333 33.5654 11.1345 33.6926 11.2612 33.7907C11.3879 33.8889 11.5363 33.9552 11.6939 33.984L11.8739 34H17.9999V40H11.8739C10.6452 40 9.43808 39.6765 8.37397 39.0621C7.30986 38.4477 6.42622 37.5641 5.81187 36.4999C5.19751 35.4358 4.87408 34.2287 4.87409 33C4.8741 31.7712 5.19754 30.5641 5.81191 29.5L7.87591 25.928L4.40991 23.928L15.4719 18.768ZM27.4999 5.94001C28.563 6.55409 29.4458 7.43695 30.0599 8.50001L32.1219 12.072L35.5879 10.072L34.5239 22.232L23.4639 17.072L26.9239 15.072L24.8639 11.5C24.7838 11.3612 24.6716 11.2437 24.5366 11.1574C24.4016 11.071 24.2479 11.0184 24.0883 11.0039C23.9287 10.9894 23.768 11.0134 23.6196 11.074C23.4713 11.1346 23.3397 11.2299 23.2359 11.352L23.1319 11.5L20.0719 16.804L14.8759 13.804L17.9359 8.50001C18.3957 7.70385 19.0079 7.00608 19.7374 6.44653C20.4669 5.88698 21.2995 5.47663 22.1876 5.2389C23.0758 5.00118 24.002 4.94074 24.9135 5.06103C25.825 5.18133 26.7039 5.48001 27.4999 5.94001Z" fill="#0D9488"/>
                    </svg>
                    <h3 class="text-3xl text-[#1F2937] font-semibold mb-3">Berkelanjutan</h3>
                </div>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>“Diproduksi dengan standar ramah lingkungan.”</li>
                    <li>“Mendukung ekosistem peternakan jangka panjang.”</li>
                    <li>“Mengurangi limbah melalui proses produksi terukur.”</li>
                </ul>
            </div>

            <div class="bg-white rounded-xl border p-6 text-center shadow-sm w-full sm:w-[48%] lg:w-[32%]">
                <div class="flex justify-center mb-4 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48" fill="none">
                        <path d="M33.7 13.7L36.58 16.58L26.82 26.34L20.24 19.76C20.055 19.5746 19.8352 19.4275 19.5932 19.3271C19.3513 19.2268 19.0919 19.1751 18.83 19.1751C18.568 19.1751 18.3087 19.2268 18.0667 19.3271C17.8248 19.4275 17.605 19.5746 17.42 19.76L5.41998 31.78C5.23481 31.9651 5.08793 32.185 4.98772 32.4269C4.88751 32.6688 4.83594 32.9281 4.83594 33.19C4.83594 33.4518 4.88751 33.7111 4.98772 33.9531C5.08793 34.195 5.23481 34.4148 5.41998 34.6C5.60514 34.7851 5.82496 34.932 6.06689 35.0322C6.30882 35.1324 6.56812 35.184 6.82998 35.184C7.09184 35.184 7.35114 35.1324 7.59307 35.0322C7.83499 34.932 8.05481 34.7851 8.23998 34.6L18.82 24L25.4 30.58C26.18 31.36 27.44 31.36 28.22 30.58L39.4 19.42L42.28 22.3C42.4197 22.437 42.5967 22.53 42.7888 22.5675C42.9809 22.6049 43.1798 22.5851 43.3608 22.5106C43.5418 22.4361 43.697 22.3101 43.807 22.1482C43.9171 21.9863 43.9772 21.7957 43.98 21.6V13C43.9855 12.8689 43.964 12.7381 43.917 12.6156C43.87 12.4931 43.7983 12.3815 43.7065 12.2878C43.6146 12.1941 43.5046 12.1202 43.383 12.0707C43.2615 12.0212 43.1312 11.9971 43 12H34.42C34.2225 11.9988 34.0292 12.0561 33.8643 12.1647C33.6994 12.2732 33.5703 12.4282 33.4933 12.61C33.4163 12.7918 33.3948 12.9923 33.4316 13.1863C33.4684 13.3802 33.5618 13.559 33.7 13.7Z" fill="#EA580C"/>
                    </svg>
                    <h3 class="text-3xl text-[#1F2937] font-semibold mb-3">Produktif</h3>
                </div>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>“Meningkatkan hasil panen dengan nutrisi seimbang.”</li>
                    <li>“Mendukung pertumbuhan ternak lebih cepat dan stabil.”</li>
                    <li>“Memaksimalkan efisiensi produksi peternakan harian.”</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="mt-20">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">

            <div class="lg:col-span-2">
                <h2 class="text-xl text-start font-medium text-[#2E7D32] mb-4">
                    Bagaimana FeedGo Dikembangkan
                </h2>

                <ul class="list-disc pl-5 space-y-3 text-gray-600 text-md leading-relaxed text-start">
                    <li>
                        <strong>Riset &amp; Formulasi</strong> – Dikembangkan berdasarkan riset nutrisi
                        dan kebutuhan ternak.
                    </li>
                    <li>
                        <strong>Uji Laboratorium</strong> – Formulasi diuji untuk memastikan keamanan
                        dan konsistensi kualitas.
                    </li>
                    <li>
                        <strong>Uji Lapangan</strong> – Diterapkan langsung pada peternakan mitra
                        untuk validasi hasil.
                    </li>
                    <li>
                        <strong>Produksi &amp; Distribusi</strong> – Diproduksi dengan standar mutu
                        dan dikirim dengan aman.
                    </li>
                </ul>
            </div>

            <div class="flex justify-center lg:justify-end">
                <div class="bg-white border rounded-xl p-6 w-full max-w-xs text-center shadow-sm">

                    <p class="text-md mb-3">
                        Startup Research-Based FeedGo<br>
                        <span class="text-[13px]">IBT-STP Universitas Hasanuddin</span>
                    </p>

                    <div class="w-20 h-20 mx-auto rounded-full bg-[#2E7D32] flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5Z"/>
                        </svg>
                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Abdul Jamil A.A
                    </h4>
                    <p class="text-sm text-gray-500">
                        Fasilitator
                    </p>
                </div>
            </div>

        </div>

    </div>

    <div class="mt-20">
        <h2 class="text-center text-2xl font-semibold text-[#2E7D32] mb-12">
            Investor Pakan Ternak
        </h2>
        <div class="mx-auto flex justify-center gap-20 flex-wrap mt-10">
            <div class="flex justify-center">
                <div class="bg-white border rounded-xl p-6 w-full max-w-xs text-center shadow-sm">

                    <p class="text-md mb-3">
                        Startup Research-Based FeedGo<br>
                        <span class="text-[13px]">IBT-STP Universitas Hasanuddin</span>
                    </p>

                    <div class="w-20 h-20 mx-auto rounded-full bg-[#2E7D32] flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5Z"/>
                        </svg>
                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Muh. Ridwan B
                    </h4>
                    <p class="text-sm text-gray-500">
                        Investor Pakan Udang
                    </p>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="bg-white border rounded-xl p-6 w-full max-w-xs text-center shadow-sm">

                    <p class="text-md mb-3">
                        Startup Research-Based FeedGo<br>
                        <span class="text-[13px]">IBT-STP Universitas Hasanuddin</span>
                    </p>

                    <div class="w-20 h-20 mx-auto rounded-full bg-[#2E7D32] flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5Z"/>
                        </svg>
                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Ihzanul
                    </h4>
                    <p class="text-sm text-gray-500">
                        Investor Pakan Kambing
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-20">
        <h2 class="text-center text-2xl font-semibold text-[#2E7D32] mb-12">
            Team Startup
        </h2>
        <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex justify-center">
                <div class="bg-white border rounded-xl p-6 w-full max-w-xs text-center shadow-sm">

                    <p class="text-md mb-3">
                        Startup Research-Based FeedGo<br>
                        <span class="text-[13px]">IBT-STP Universitas Hasanuddin</span>
                    </p>

                    <div class="w-20 h-20 mx-auto rounded-full bg-[#2E7D32] flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5Z"/>
                        </svg>
                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Muh. Rifky Aqid
                    </h4>
                    <p class="text-sm text-gray-500">
                        CEO (Chief Executive Officer)
                    </p>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="bg-white border rounded-xl p-6 w-full max-w-xs text-center shadow-sm">

                    <p class="text-md mb-3">
                        Startup Research-Based FeedGo<br>
                        <span class="text-[13px]">IBT-STP Universitas Hasanuddin</span>
                    </p>

                    <div class="w-20 h-20 mx-auto rounded-full bg-[#2E7D32] flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5Z"/>
                        </svg>
                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Andi Aliyah Tenri
                    </h4>
                    <p class="text-sm text-gray-500">
                        CMO (Chief Marketing Officer)
                    </p>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="bg-white border rounded-xl p-6 w-full max-w-xs text-center shadow-sm">

                    <p class="text-md mb-3">
                        Startup Research-Based FeedGo<br>
                        <span class="text-[13px]">IBT-STP Universitas Hasanuddin</span>
                    </p>

                    <div class="w-20 h-20 mx-auto rounded-full bg-[#2E7D32] flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5Z"/>
                        </svg>
                    </div>

                    <h4 class="font-semibold text-gray-800">
                        -
                    </h4>
                    <p class="text-sm text-gray-500">
                        CPO (Chief Product Officer)
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-20">
        <h2 class="text-center text-2xl font-semibold text-[#2E7D32] mb-12">
            Hubungi Kami
        </h2>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-10 items-start">

            <div class="text-start">
                <h3 class="font-semibold text-xl text-gray-700 ">Lokasi</h3>
                <div class="w-full h-64 rounded-xl overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127147.27477395958!2d119.42145894261952!3d-5.207201509639711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd3abddc814f%3A0x75803b4d36d5abea!2sScience%20Techno%20Park%20Universitas%20Hasanuddin!5e0!3m2!1sid!2sid!4v1769012771404!5m2!1sid!2sid"
                width="341" height="256" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                </div>
            </div>

            <div class="col-span-2 flex flex-col h-full">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-y-8">

                    <div class="text-start">
                        <h3 class="font-semibold text-gray-700 mb-3">Email</h3>
                        <div class="inline-block bg-[#6FA04D] text-white px-7 py-4 rounded-lg text-sm font-medium">
                            hellofeedgo@gmail.com
                        </div>
                    </div>

                    <div class="text-start">
                    <h3 class="font-semibold text-gray-700 mb-3">Sosial media</h3>
                        <div class="flex gap-7">
                            <div class="w-14 h-14 bg-[#6FA04D] rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" viewBox="0 0 24 24">
                                    <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm5 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm6.5-.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/>
                                </svg>
                            </div>

                            <div class="w-14 h-14 bg-[#6FA04D] rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" viewBox="0 0 24 24">
                                    <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.2l-.3 3h-1.9v7A10 10 0 0 0 22 12Z"/>
                                </svg>
                            </div>

                            <div class="w-14 h-14 bg-[#6FA04D] rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" viewBox="0 0 24 24">
                                    <path d="M22 5.9c-.8.4-1.6.6-2.5.8a4.3 4.3 0 0 0 1.9-2.4c-.9.6-1.9 1-3 1.2a4.3 4.3 0 0 0-7.3 3v1a12 12 0 0 1-8.8-4.5s-4 9 5 13a12.5 12.5 0 0 1-7 2c9 5 20 0 20-11.5v-.5c.8-.6 1.6-1.4 2.2-2.3Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="text-start">
                        <div class="flex gap-2 items-center gap-2">
                            <x-svg.rocket-svg-icon/>
                            <h3 class="text-lg font-medium">Mari berkolaborasi!</h3>
                        </div>
                        <span class="text-sm">Pakan inovatif, Pakan produktif</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/FeedGo.webp') }}" alt="Logo FeedGo" class=" h-20"/>
                        <img src="{{ asset('images/Unhas.webp') }}" alt="Logo Unhas" class="ml-4 h-25"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
