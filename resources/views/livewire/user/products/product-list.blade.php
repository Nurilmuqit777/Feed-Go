<div>

    <div class="mb-6">

        <h2 class="text-[#2E7D32] font-semibold text-2xl mb-2">
          Produk Pakan Berbasis Riset dari Mitra Lokal
        </h2>
        <p class="text-[#0B460E] text-sm">
          Temukan produk pakan berkualitas premium berbasis riset dari mitra lokal terverifikasi.
        </p>

    </div>

    <div class="flex flex-wrap gap-4 items-center">

      <div class="flex item-center gap-2 flex-1 border-3 rounded-lg px-4 py-2 w-full focus-within:ring-0 focus-within:ring-[#2E7D32] focus-within:border-[#2E7D32] transition">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
        </svg>
        <input
        type="text"
        wire:model.live.debounce.300ms="search"
        placeholder="Cari produk pakan berbasis riset atau kategori..."
        class="text-sm w-full bg-transparent outline-none text-gray-700"
        />
      </div>

      <div class="relative" x-data="{ open: false }">

        <button @click="open = !open" class="flex items-center gap-2 px-6 py-2.5 border-3 rounded-lg hover:bg-gray-50 hover:border-[#2E7D32] transition-all duration-300 text-sm text-black">
          <span>
              @if($selectedCategory)
                  {{ Str::title($categories->find($selectedCategory)->category) }}
              @else
                  Semua Kategori
              @endif
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="transition-transform duration-300" :class="open ? 'rotate-180' : ''">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5703 13.7072C10.3828 13.8947 10.1285 14 9.86335 14C9.59818 14 9.34387 13.8947 9.15635 13.7072L3.49934 8.05021C3.31719 7.86161 3.21639 7.60901 3.21867 7.34681C3.22095 7.08462 3.32612 6.8338 3.51153 6.64839C3.69694 6.46299 3.94775 6.35782 4.20994 6.35554C4.47214 6.35326 4.72474 6.45406 4.91334 6.63621L9.86335 11.5862L14.8133 6.63621C15.0019 6.45406 15.2545 6.35326 15.5167 6.35554C15.7789 6.35782 16.0298 6.46299 16.2152 6.64839C16.4006 6.8338 16.5057 7.08462 16.508 7.34681C16.5103 7.60901 16.4095 7.86161 16.2273 8.05021L10.5703 13.7072Z" fill="#727272"/>
          </svg>
        </button>

        <div
            x-show="open"
            @click.away="open = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
            style="display: none;">

            <div class="py-2">

                <button
                    wire:click="$set('selectedCategory', null)"
                    @click="open = false"
                    class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition
                           {{ $selectedCategory === null ? 'bg-green-50 text-[#2E7D32] font-semibold' : 'text-gray-700' }}">
                    Semua Kategori
                </button>

                <div class="border-t border-gray-100 my-2"></div>

                @foreach($categories as $category)
                <button
                    wire:click="$set('selectedCategory', {{ $category->id }})"
                    @click="open = false"
                    class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition flex items-center gap-2
                           {{ $selectedCategory == $category->id ? 'bg-green-50 font-semibold' : 'text-gray-700' }}">

                    <span class="{{ $selectedCategory == $category->id ? 'text-[#2E7D32]' : '' }}">
                        {{ Str::title($category->category) }}
                    </span>

                    @if($selectedCategory == $category->id)
                    <svg class="w-4 h-4 ml-auto text-[#2E7D32]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    @endif
                </button>
                @endforeach
            </div>

        </div>

      </div>

      <div class="relative" x-data="{ open: false }">

        <button @click="open = !open" class="flex items-center gap-2 px-6 py-2.5 border-3 rounded-lg hover:bg-gray-50 hover:border-[#2E7D32] transition-all duration-300 text-sm text-black">
          <span>
            @if($sortBy == 'terbaru')
                Terbaru
            @elseif($sortBy == 'terlama')
                Terlama
            @elseif($sortBy == 'termurah')
                Harga Termurah
            @elseif($sortBy == 'termahal')
                Harga Termahal
            @else
                Urutkan
            @endif
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="transition-transform duration-300" :class="open ? 'rotate-180' : ''">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5703 13.7072C10.3828 13.8947 10.1285 14 9.86335 14C9.59818 14 9.34387 13.8947 9.15635 13.7072L3.49934 8.05021C3.31719 7.86161 3.21639 7.60901 3.21867 7.34681C3.22095 7.08462 3.32612 6.8338 3.51153 6.64839C3.69694 6.46299 3.94775 6.35782 4.20994 6.35554C4.47214 6.35326 4.72474 6.45406 4.91334 6.63621L9.86335 11.5862L14.8133 6.63621C15.0019 6.45406 15.2545 6.35326 15.5167 6.35554C15.7789 6.35782 16.0298 6.46299 16.2152 6.64839C16.4006 6.8338 16.5057 7.08462 16.508 7.34681C16.5103 7.60901 16.4095 7.86161 16.2273 8.05021L10.5703 13.7072Z" fill="#727272"/>
          </svg>
        </button>

        <div
          x-show="open"
          @click.away="open = false"
          x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-150"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
          class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
          style="display: none;">

          <div class="py-2">

              <button
                  wire:click="$set('sortBy', '')"
                  @click="open = false"
                  class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition
                         {{ $sortBy === '' ? 'bg-green-50 text-[#2E7D32] font-semibold' : 'text-gray-700' }}">
                  Urutkan
              </button>
              <div class="border-t border-gray-100 my-2"></div>

              <button
                  wire:click="$set('sortBy', 'terbaru')"
                  @click="open = false"
                  class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition flex items-center gap-2
                         {{ $sortBy == 'terbaru' ? 'bg-green-50 font-semibold text-[#2E7D32]' : 'text-gray-700' }}">
                  Terbaru
                  @if($sortBy == 'terbaru')
                  <svg class="w-4 h-4 ml-auto text-[#2E7D32]" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  @endif
              </button>
              <button
                  wire:click="$set('sortBy', 'terlama')"
                  @click="open = false"
                  class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition flex items-center gap-2
                         {{ $sortBy == 'terlama' ? 'bg-green-50 font-semibold text-[#2E7D32]' : 'text-gray-700' }}">
                  Terlama
                  @if($sortBy == 'terlama')
                  <svg class="w-4 h-4 ml-auto text-[#2E7D32]" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  @endif
              </button>
              <button
                  wire:click="$set('sortBy', 'termurah')"
                  @click="open = false"
                  class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition flex items-center gap-2
                         {{ $sortBy == 'termurah' ? 'bg-green-50 font-semibold text-[#2E7D32]' : 'text-gray-700' }}">
                  Harga Termurah
                  @if($sortBy == 'termurah')
                  <svg class="w-4 h-4 ml-auto text-[#2E7D32]" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  @endif
              </button>
              <button
                  wire:click="$set('sortBy', 'termahal')"
                  @click="open = false"
                  class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition flex items-center gap-2
                         {{ $sortBy == 'termahal' ? 'bg-green-50 font-semibold text-[#2E7D32]' : 'text-gray-700' }}">
                  Harga Termahal
                  @if($sortBy == 'termahal')
                  <svg class="w-4 h-4 ml-auto text-[#2E7D32]" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  @endif
              </button>
          </div>
        </div>
      </div>

      <button
        wire:click="resetFilter"
        class="flex items-center gap-2 px-6 py-2.5 border-3 rounded-lg hover:bg-gray-50 hover:border-[#2E7D32] transition-all duration-300 text-sm text-black">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
          <path d="M8.98377 3.75V0.75L5.24056 4.5L8.98377 8.25V5.25C11.4618 5.25 13.4756 7.2675 13.4756 9.75C13.4756 12.2325 11.4618 14.25 8.98377 14.25C6.50576 14.25 4.49191 12.2325 4.49191 9.75H2.99463C2.99463 13.065 5.67477 15.75 8.98377 15.75C12.2928 15.75 14.9729 13.065 14.9729 9.75C14.9729 6.435 12.2928 3.75 8.98377 3.75Z" fill="#EA0234"/>
        </svg>
        Reset
      </button>

      <div class="ml-auto text-sm text-gray-600">
        menampilkan {{ $products->total() }} produk
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 mt-8">
      @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          @foreach ($products as $product)
          <a href="{{ route('product.show', $product->product_slug) }}" class="rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 duration-300 block">

            <div class="relative rounded-t-xl p-6 pb-8 bg-gradient-to-br from-[#CDEAC0] via-[#9BCF8A] to-[#6C9D50] text-white">
              @if($product->isNew())
              <span class="absolute top-2 w-9 h-9 left-2 text-[11px] bg-[#EAAA00] items-center justify-center flex px-2 py-0.5 rounded-full">
                Baru
              </span>
              @endif
              <img src="{{ asset('storage/' . $product->product_image1) }}"
                   class="h-38 mx-auto object-contain" alt="{{ $product->product_name }}"/>
              @if($product->hasDiscount)
              <span class="absolute bottom-2 left-2 text-[9px] bg-[#E81010] rounded-full px-2 py-0.5">{{ $product->discountPercentage }} % off</span>
              @endif
              <span class="absolute bottom-2 right-2 text-[9px]">{{ $product->product_weight }} {{ $product->product_unit }}</span>
            </div>

            <div class="p-2">
                <div class="flex justify-between">
                    <h3 class="font-semibold text-sm mb-1 text-black">{{ Str::title($product->category->category) }}</h3>
                    <span class="text-xs font-semibold {{ $product->product_stock > 0 ? 'text-[#2E7D32]' : 'text-[#E81010]' }}">
                    &#9679;{{ $product->product_stock > 0 ? 'tersedia' : 'habis' }}</span>
                </div>
              <p class="text-xs font-semibold text-black mb-2 text-start opacity-45">{{ $product->product_name }}</p>
              <div class="flex gap-3">
                <span class="font-semibold text-black text-sm">Rp {{ number_format($product->product_discount_price ?? $product->product_price, 0, ',', '.') }}</span>
                @if ($product->product_discount_price)
                <span class="line-through text-xs text-black opacity-40">
                    Rp {{ number_format($product->product_price, 0, ',', '.') }}
                </span>
                @endif
              </div>
            </div>

          </a>
          @endforeach
        </div>
      @else

        <div class="flex flex-col items-center justify-center py-16 px-4">
          <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
          </svg>

          @if($search || $selectedCategory)

            <h3 class="text-xl font-semibold text-gray-700 mb-2">Produk Tidak Ditemukan</h3>
            <p class="text-gray-500 text-center mb-4">
              Maaf, kami tidak menemukan produk yang sesuai dengan pencarian
              @if($search)
                <span class="font-semibold">"{{ $search }}"</span>
              @endif
          @else

            <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Produk</h3>
            <p class="text-gray-500 text-center">
              Saat ini belum ada produk yang tersedia. Silakan cek kembali nanti.
            </p>
          @endif
        </div>
      @endif
    </div>
    <div class="mt-6">
      {{ $products->links(data: ['scrollTo' => false]) }}
    </div>
</div>
