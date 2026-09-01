@extends('app')

@section('title', 'Kebijakan Privasi')

@php
    $headerCompact = true;
@endphp

@section('content')

<section class="max-w-5xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-50 relative z-20 p-10 px-20 text-black">
    <div class="text-center">

        <h1 class="font-semibold text-2xl">Kebijakan Privasi</h1>
        <span class="block mt-5">Terakhir diperbaharui: 10 Januari 2026</span>
        <p class="block mt-5 text-gray-600">FeedGo menghargai dan melindungi data pribadi Pengguna sesuai peraturan perundang-undangan yang berlaku di Indonesia.</p>
    </div>

    <div class="space-y-8 text-base text-gray-700 mt-10">

            <section>
                <h2 class="font-semibold text-lg">1. Data yang dikumpulkan</h2>
                <span>FeedGo dapat mengumpulkan:</span>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Nama lengkap</li>
                    <li>Alamat email</li>
                    <li>Nomor telepon</li>
                    <li>Alamat pengiriman</li>
                    <li>Data transaksi</li>
                    <li>Bukti pembayaran</li>
                    <li>Bukti foto/video pengembalian</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">2. Penggunaan Data</h2>
                <span>Data digunakan untuk:</span>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Memproses pesanan dan pengiriman</li>
                    <li>Verifikasi pembayaran</li>
                    <li>Penanganan komplain dan pengembalian</li>
                    <li>Keperluan administratif dan legal</li>
                    <li>Peningkatan layanan FeedGo</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">3. Penyimpanan dan Keamanan Data</h2>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Data disimpan di server yang aman</li>
                    <li>FeedGo menerapkan langkah teknis dan organisasi untuk melindungi data</li>
                    <li>Akses data dibatasi untuk pihak berwenang</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">4. Pembagian Data</h2>
                <span>FeedGo tidak menjual data pengguna.</span>
                <span>Data hanya dapat dibagikan kepada:</span>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Mitra pengiriman</li>
                    <li>Penyedia pembayaran</li>
                    <li>Pihak berwenang jika diwajibkan hukum</li>
                </ul>
            </section>


            <section>
                <h2 class="font-semibold text-lg">5. Cookie & Teknologi Serupa</h2>
                <span>FeedGo menggunakan cookie untuk:</span>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Autentikasi</li>
                    <li>Analitik penggunaan</li>
                    <li>Peningkatan pengalaman pengguna</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">6. Perubahan Kebijakan Privasi</h2>
                <span>FeedGo dapat memperbarui Kebijakan Privasi sewaktu-waktu.</span>
            </section>

            <section>
                <h2 class="font-semibold text-lg">7. Kontak</h2>
                <p>Jika ada pertanyaan terkait Syarat & Ketentuan atau Kebijakan Privasi, silakan hubungi:</p>
                <p class="underline">hello@feedgo.com</p>
                <p>WhatsApp Admin FeedGo</p>
            </section>
        </div>
</section>

@endsection
