<div class="relative" x-data="{ focused: false }">
    <div class="flex gap-3 max-w-md mx-auto lg:mx-0 z-20">

        <div class="relative flex-1">

            <div class="bg-[#C8E6C9] rounded-full flex items-center px-4 py-2 w-full max-w-md shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M16.65 10.65a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    @focus="focused = true"
                    @keydown.escape="$wire.clearSearch(); focused = false"
                    placeholder="Cari produk......"
                    class="bg-transparent outline-none text-sm w-full text-green-900 placeholder-green-700"
                />

                <div wire:loading wire:target="search" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                    <svg class="w-4 h-4 animate-spin text-[#5EB661]" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>

            @if($search)
            <button
                wire:click="clearSearch"
                @click="focused = false"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-[#5EB661] hover:text-gray-700 transition"
                wire:loading.remove>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            @endif

            @if($showResults)
            <div
                x-show="true"
                @click.away="focused = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute z-50 w-full mt-2 bg-white rounded-lg shadow-xl border border-gray-200 max-h-96 overflow-y-auto">

                @if($results->count() > 0)
                    <div class="py-2">
                        <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">
                            {{ $results->count() }} Hasil ditemukan
                        </div>
                        @foreach($results as $products)
                        @php
                            $badgeColor = match(strtoupper($products->category->category)) {
                                'PAKAN UDANG' => '#2563EB',
                                'PAKAN KAMBING' => '#EAAA00',
                                default => '#6B7280'
                            };
                        @endphp
                        <a
                            href="{{ route('product.show', $products->product_slug) }}"
                            class="flex gap-3 px-4 py-3 hover:bg-gray-50 transition group">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{ asset('storage/' . $products->product_image1) }}"
                                    alt="{{ $products->title }}"
                                    class="w-16 h-16 object-cover rounded-lg"
                                />
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="inline-block text-white text-xs px-2 py-0.5 rounded-full mb-1"
                                      style="background-color: {{ $badgeColor }}">
                                    {{ Str::title($products->category->category) }}
                                </span>
                                <h4 class="text-sm font-semibold text-gray-900 group-hover:text-[#2D5016] line-clamp-1 transition">
                                    {{ $products->product_name }}
                                </h4>
                                <div class="text-xs text-gray-600 line-clamp-2 mt-1 trix-content">
                                    {!! $products->product_description !!}
                                </div>
                            </div>
                        </a>

                        @if(!$loop->last)
                        <div class="border-t border-gray-100 mx-4"></div>
                        @endif

                        @endforeach
                    </div>

                @else
                    <div class="px-4 py-8 text-center">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2C9.1446 2.00012 7.80887 2.32436 6.60427 2.94569C5.39966 3.56702 4.3611 4.46742 3.57525 5.57175C2.78939 6.67609 2.27902 7.95235 2.08672 9.29404C1.89442 10.6357 2.02576 12.004 2.46979 13.2846C2.91382 14.5652 3.65766 15.7211 4.63925 16.6557C5.62084 17.5904 6.81171 18.2768 8.11252 18.6576C9.41333 19.0384 10.7864 19.1026 12.117 18.8449C13.4477 18.5872 14.6975 18.015 15.762 17.176L19.414 20.828C19.6026 21.0102 19.8552 21.111 20.1174 21.1087C20.3796 21.1064 20.6304 21.0012 20.8158 20.8158C21.0012 20.6304 21.1064 20.3796 21.1087 20.1174C21.111 19.8552 21.0102 19.6026 20.828 19.414L17.176 15.762C18.164 14.5086 18.7792 13.0024 18.9511 11.4157C19.123 9.82905 18.8448 8.22602 18.1482 6.79009C17.4517 5.35417 16.3649 4.14336 15.0123 3.29623C13.6597 2.44911 12.096 1.99989 10.5 2ZM4.00001 10.5C4.00001 8.77609 4.68483 7.12279 5.90382 5.90381C7.1228 4.68482 8.7761 4 10.5 4C12.2239 4 13.8772 4.68482 15.0962 5.90381C16.3152 7.12279 17 8.77609 17 10.5C17 12.2239 16.3152 13.8772 15.0962 15.0962C13.8772 16.3152 12.2239 17 10.5 17C8.7761 17 7.1228 16.3152 5.90382 15.0962C4.68483 13.8772 4.00001 12.2239 4.00001 10.5Z" fill="black" fill-opacity="0.65"/>
                        </svg>
                        <p class="text-sm text-gray-600 mb-1">Tidak ada hasil</p>
                        <p class="text-xs text-gray-500">Coba kata kunci lain</p>
                    </div>
                @endif

            </div>
            @endif

        </div>

    </div>
</div>
