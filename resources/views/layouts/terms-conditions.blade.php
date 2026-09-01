@extends('app')

@section('title', 'Syarat & Ketentuan')

@php
    $headerCompact = true;
@endphp

@section('content')

<section class="max-w-5xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-50 relative z-20 p-10 px-20 text-black">
    <div class="text-center">

        <h1 class="font-semibold text-2xl">Syarat & Ketentuan</h1>
        <span class="block mt-5">Terakhir diperbaharui: 10 Januari 2026</span>
        <p class="block mt-5 text-gray-600">Dengan mengakses dan menggunakan layanan FeedGo, pengguna dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan berikut.</p>
    </div>

    <div class="space-y-8 text-base text-gray-700 mt-10">

            <section>
                <h2 class="font-semibold text-lg">1. Definisi</h2>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>FeedGo adalah platform penjualan pakan ternak berbasis riset nutrisi</li>
                    <li>Pengguna adalah individu atau badan hukum yang menggunakan layanan FeedGo</li>
                    <li>Pesanan adalah permintaan pembelian produk yang dilakukan melalui sistem FeedGo</li>
                    <li>Produk adalah pakan ternak yang dijual melalui FeedGo</li>
                    <li>Pengembalian adalah proses klaim atas produk yang diterima tidak sesuai atau rusak</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">2. Akun Pengguna</h2>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Pengguna wajib memberikan data yang benar, lengkap, dan dapat dipertanggungjawabkan</li>
                    <li>Pengguna bertanggung jawab atas keamanan akun dan aktivitas yang terjadi di dalamnya</li>
                    <li>FeedGo berhak menangguhkan akun apabila ditemukan pelanggaran</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">3. Pemesanan dan Pembayaran</h2>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Pesanan dianggap sah setelah pembayaran berhasil diverifikasi sistem</li>
                    <li>FeedGo menyediakan metode pembayaran melalui QRIS dan kanal resmi lainnya</li>
                    <li>Pesanan yang telah dibayar tidak dapat dibatalkan secara sepihak oleh Pengguna</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">4. Proses Pesanan</h2>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>Pesanan Dibuat – pesanan telah dibuat namun belum dibayar</li>
                    <li>Diproses – pembayaran berhasil diverifikasi dan pesanan disiapkan</li>
                    <li>Dikirim – pesanan telah diserahkan ke pihak pengiriman</li>
                    <li>Selesai – pesanan telah diterima oleh Pengguna</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">5. Pengiriman</h2>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>FeedGo bekerja sama dengan jasa pengiriman pihak ketiga</li>
                    <li>Estimasi waktu pengiriman bersifat perkiraan dan dapat berubah</li>
                    <li>Risiko keterlambatan akibat pihak ketiga bukan tanggung jawab FeedGo sepenuhnya</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">6. Pembatasan Tanggung Jawab</h2>
                <ul class="list-disc pl-5 space-y-1 ml-5">
                    <li>FeedGo tidak bertanggung jawab atas kerugian tidak langsung</li>
                    <li>FeedGo tidak menjamin hasil penggunaan produk di luar petunjuk</li>
                </ul>
            </section>

            <section>
                <h2 class="font-semibold text-lg">7. Perubahan Syarat & Ketentuan</h2>
                <span>FeedGo berhak mengubah isi Syarat & Ketentuan kapan saja. Perubahan akan diinformasikan melalui platform resmi</span>
            </section>

            <section>
                <h2 class="font-semibold text-lg">8. Hukum yang Berlaku</h2>
                <span>Syarat & Ketentuan ini tunduk pada hukum Republik Indonesia</span>
            </section>

            <section>
                <h2 class="font-semibold text-lg">9. Kontak</h2>
                <p>Jika ada pertanyaan terkait Syarat & Ketentuan atau Kebijakan Privasi, silakan hubungi:</p>
                <p class="underline">hello@feedgo.com</p>
                <p>WhatsApp Admin FeedGo</p>
            </section>
        </div>
</section>

@endsection
