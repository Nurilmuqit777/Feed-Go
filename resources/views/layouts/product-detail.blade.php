@extends('app')

@section('title', $product->product_name)

@section('content')

@section('header-content')
<div class="max-w-6xl mx-auto px-6 py-6 items-center">

    <livewire:user.products.product-detail :product="$product" />

</div>
@endsection
<div x-data="{ tab: 'description' }" class="max-w-6xl mx-auto px-6">

    <div class="border-b border-gray-200">
        <div class="flex justify-center gap-10">
            <button
                @click="tab = 'description'"
                class="px-12 py-4 font-semibold"
                :class="tab === 'description'
                    ? 'text-[#388E3C] border-b-2 border-black'
                    : 'text-gray-500'"
            >
                Deskripsi
            </button>

            <button
                @click="tab = 'review'"
                class="px-12 py-4 font-semibold"
                :class="tab === 'review'
                    ? 'text-[#388E3C] border-b-2 border-black'
                    : 'text-gray-500'"
            >
                Ulasan
            </button>
        </div>
    </div>

    <div x-show="tab === 'description'" x-transition class="py-8 [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:ml-4 [&_ol]:list-decimal [&_ol]:pl-6 [&_li]:mb-1">
        <h1 class="text-xl font-bold text-[#2D5016] mb-4">Deskripsi Produk</h1>
        {!! $product->product_description ?? '<p class="text-gray-600">Tidak ada deskripsi untuk produk ini.</p>' !!}
    </div>

    <div x-show="tab === 'review'" x-transition class="py-8" x-data="{ visibleReviews: 6, totalReviews: {{ $product->reviews->count() }} }">

        @php
            $reviews = $product->reviews;
            $totalReviews = $reviews->count();
        @endphp

        <div class="mb-10">
            <h2 class="text-2xl font-bold text-[#2D5016]">
                Semua Ulasan
                <span class="font-normal text-gray-500">
                    ({{ $totalReviews }})
                </span>
            </h2>
        </div>

        @if($totalReviews > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @foreach($reviews as $index => $review)

                    <div
                        x-show="{{ $index }} < visibleReviews"
                        x-transition
                        class="border border-gray-200 rounded-3xl p-6 bg-white"
                    >

                        <div class="flex items-center gap-1 mb-5">

                            @for($i = 1; $i <= 5; $i++)
                                <span
                                    class="text-3xl leading-none
                                    {{ $i <= $review->rating
                                        ? 'text-[#FFB82E]'
                                        : 'text-gray-300' }}"
                                >
                                    ★
                                </span>
                            @endfor

                        </div>

                        <div class="flex items-center gap-2 mb-4">

                            <h3 class="text-lg font-bold text-gray-900">
                                {{ $review->user?->name ?? 'Pengguna' }}
                            </h3>

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z" fill="#01AB31"/>
                            </svg>

                        </div>

                        @if($review->review_text)

                            <p class="text-base text-gray-500 leading-relaxed mb-8">
                                “{{ $review->review_text }}”
                            </p>

                        @else

                            <p class="text-base text-gray-400 italic mb-8">
                                Pengguna tidak memberikan komentar.
                            </p>

                        @endif

                        <p class="text-sm text-gray-500">
                            Ditulis pada
                            {{ $review->created_at->translatedFormat('d F Y') }}
                        </p>

                    </div>

                @endforeach

            </div>

            @if($totalReviews > 6)

                <div class="flex justify-center mt-10" x-show="visibleReviews < totalReviews">

                    <button
                        type="button"
                        @click="visibleReviews += 6"
                        class="px-8 py-3 border border-[#2E7D32] text-[#2E7D32] rounded-xl font-semibold hover:bg-[#2E7D32] hover:text-white transition">
                        Muat ulasan lainnya
                    </button>

                </div>

            @endif


        @else

            <div class="py-16 text-center">

                <div class="text-5xl text-gray-300 mb-4">
                    ★
                </div>

                <h3 class="text-xl font-semibold text-gray-700">
                    Belum ada ulasan
                </h3>

                <p class="text-gray-500 mt-2">
                    Belum ada pelanggan yang memberikan ulasan untuk produk ini.
                </p>

            </div>

        @endif

    </div>

    <div class="border-t border-gray-300"></div>

    <div class="py-8">
        <p>Untuk informasi lebih lanjut, silakan hubungi FeedGo.</p>
        <p class="text-[#2D5016]">"Pakan Inovatif, Hasil produktif."</p>
    </div>

</div>

<section class="max-w-7xl mx-auto px-6 py-6 items-center bg-gradient-to-b from-[#2E7D32] to-[#76A95C] rounded-xl text-white">

    <div class="text-center mb-10">
        <h2 class="text-2xl md:text-3xl font-semibold text-white">
            Produk Terkait
        </h2>
    </div>


    @if($relatedProducts->isNotEmpty())

        <div class="max-w-6xl mx-auto">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

                @foreach($relatedProducts as $relatedProduct)

                <a href="{{ route('product.show', $relatedProduct->product_slug) }}" class="rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 duration-300 block">

                  <div class="relative rounded-t-xl p-6 pb-8 bg-gradient-to-br from-[#CDEAC0] via-[#9BCF8A] to-[#6C9D50] text-white">

                    @if($relatedProduct->isNew())
                    <span class="absolute top-2 w-9 h-9 left-2 text-[11px] bg-[#EAAA00] items-center justify-center flex px-2 py-0.5 rounded-full">
                      Baru
                    </span>
                    @endif

                    <img src="{{ asset('storage/' . $relatedProduct->product_image1) }}"
                         class="h-38 mx-auto object-contain" alt="{{ $relatedProduct->product_name }}"/>

                    @if($relatedProduct->hasDiscount)

                    <span class="absolute bottom-2 left-2 text-[9px] bg-[#E81010] rounded-full px-2 py-0.5">{{ $relatedProduct->discountPercentage }} % off</span>

                    @endif
                    <span class="absolute bottom-2 right-2 text-[9px]">{{ $relatedProduct->product_weight }} {{ $relatedProduct->product_unit }}</span>

                  </div>

                  <div class="p-2 bg-white rounded-b-xl text-center">

                      <div class="flex justify-between">
                          <h3 class="font-semibold text-sm mb-1 text-black">{{ Str::title($relatedProduct->category->category) }}</h3>
                          <span class="text-xs font-semibold {{ $relatedProduct->product_stock > 0 ? 'text-[#2E7D32]' : 'text-[#E81010]' }}">
                          &#9679;{{ $relatedProduct->product_stock > 0 ? 'tersedia' : 'habis' }}</span>
                      </div>

                    <p class="text-xs font-semibold text-black mb-2 text-start opacity-45">{{ $relatedProduct->product_name }}</p>

                    <div class="flex gap-3">
                      <span class="font-semibold text-black text-sm">Rp {{ number_format($relatedProduct->product_discount_price ?? $relatedProduct->product_price, 0, ',', '.') }}</span>

                      @if ($relatedProduct->product_discount_price)
                      <span class="line-through text-xs text-black opacity-40">
                          Rp {{ number_format($relatedProduct->product_price, 0, ',', '.') }}
                      </span>
                      @endif

                    </div>

                  </div>

                </a>

                @endforeach

            </div>

            <div class="flex justify-center mt-10">

                <a href="{{ route('produk') }}" class="inline-flex items-center justify-center min-w-[156px] px-6 py-3 bg-[#EAAA00] hover:bg-[#d99d00] text-white text-sm font-semibold rounded-md transition hover:scale-105 active:scale-95">
                    Lihat Lainnya
                </a>

            </div>

        </div>

    @else

        <div class="text-center py-10">
            <p class="text-white/80">
                Belum ada produk terkait.
            </p>
        </div>

    @endif

</section>
@endsection
