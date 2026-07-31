@extends('app')

@section('title', 'Kontak kami')

@section('content')

@section('header-content')
<div class="max-w-6xl mx-auto px-8 py-12 grid grid-cols-1 md:grid-cols-2 gap-8 items-end">

    <div class="space-y-8 text-white">

        <div class="space-y-2">
            <h2 class="text-3xl font-bold">Kontak Kami</h2>
            <p class="text-sm text-white/80 leading-relaxed">
                Butuh bantuan atau informasi seputar produk FeedGo? <br>
                Tim kami siap membantu Anda.
            </p>
            <div class="pt-2 space-y-1">
                <p class="font-bold text-sm">Jam Operasional:</p>
                <p class="text-sm text-white/90">Senin – Jumat</p>
                <p class="text-sm text-white/90">09.30 – 17.00 WITA</p>
            </div>
        </div>

        <div class="space-y-4">
            <h2 class="text-3xl font-bold">Layanan Pelanggan</h2>

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-white shrink-0 bg-white">
                    <img
                        src="{{ asset('images/FeedGo.webp') }}"
                        alt="FeedGo"
                        class="w-full h-full object-contain"
                    />
                </div>
                <div>
                    <p class="font-semibold text-sm">Tim Support FeedGo</p>
                    <p class="text-sm text-white/80">0813-43xx-xxxx</p>
                </div>
            </div>

            <a
                href="https://wa.me/62813xxxxxxxx"
                target="_blank"
                class="inline-flex items-center gap-2 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold px-6 py-3 rounded-full transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Chat Via WhatsApp
            </a>
        </div>
    </div>

    <div class="flex justify-end items-end">
        <img
            src="{{ asset('images/Nelpon.webp') }}"
            alt="Tim FeedGo"
            class="w-72 md:w-96 md:justify-centerobject-contain drop-shadow-lg justify-center"
        />
    </div>
</div>
@endsection

@endsection
