<div>
    @if($open && $orderDetail)
    <div
        x-data="{ open: true }"
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
    >

        <div class="absolute inset-0 bg-black/40 dark:bg-black/60" @click="$wire.close()"></div>

        <div
            x-show="open"
            x-transition.scale
            class="relative z-10 w-full max-w-xl rounded-2xl bg-white dark:bg-neutral-800 shadow-2xl p-7">

            <div class="mb-6">
                @if (!$viewOnly)
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Nilai Produk
                </h2>

                <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                    Seberapa Puas dengan produk ini?
                </p>
                @else
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Penilaian Produk
                </h2>
                @endif
            </div>

            <div class="flex items-center gap-3 mb-6">

                <div class="w-[74px] h-[84px] rounded-md overflow-hidden bg-green-700 shrink-0">
                    <img
                        src="{{ asset('storage/' . $orderDetail->product->product_image1) }}"
                        alt="{{ $orderDetail->product->product_name }}"
                        class="w-full h-full object-contain"
                    >
                </div>

                <div class="flex items-center gap-2 min-w-0">
                    <span class="text-base text-gray-900 dark:text-white">
                        {{ $orderDetail->product->product_name }}
                    </span>

                    <span class="text-gray-500">–</span>

                    <span class="text-base text-gray-900 dark:text-white">
                        {{ \Illuminate\Support\Str::title($orderDetail->product->category->category) }}
                    </span>

                    <span class="text-gray-500">
                        x{{ $orderDetail->quantity_ordered }}
                    </span>
                </div>

            </div>

            <div class="flex items-center gap-4 mb-6">

                <span class="text-base text-gray-900 dark:text-white whitespace-nowrap">
                    Kualitas Produk
                </span>

                <div class="flex items-center gap-1">

                    @for ($i = 1; $i <= 5; $i++)
                        @if(!$viewOnly)
                        <button type="button" wire:click="setRating({{ $i }})" class="transition-transform hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="46" viewBox="0 0 48 46" fill="{{ $i <= $rating ? '#FBBF24' : 'none' }}" stroke="{{ $i <= $rating ? '#FBBF24' : '#D1D5DB' }}" stroke-width="1.5">
                                <path d="M23.7764 0L30.8592 15.2513L47.5528 17.2746L35.2366 28.7237L38.471 45.2254L23.7764 37.05L9.08174 45.2254L12.3161 28.7237L-4.57764e-05 17.2746L16.6936 15.2513L23.7764 0Z"/>
                            </svg>
                        </button>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="46" viewBox="0 0 48 46" fill="{{ $i <= $rating ? '#FBBF24' : 'none' }}" stroke="{{ $i <= $rating ? '#FBBF24' : '#D1D5DB' }}" stroke-width="1.5">
                                <path d="M23.7764 0L30.8592 15.2513L47.5528 17.2746L35.2366 28.7237L38.471 45.2254L23.7764 37.05L9.08174 45.2254L12.3161 28.7237L-4.57764e-05 17.2746L16.6936 15.2513L23.7764 0Z"/>
                            </svg>
                        @endif
                    @endfor

                </div>

                <span class="text-base text-gray-900 dark:text-white">
                    @switch($rating)
                        @case(1) Sangat Buruk @break
                        @case(2) Buruk @break
                        @case(3) Cukup @break
                        @case(4) Baik @break
                        @case(5) Sangat Baik @break
                    @endswitch
                </span>

            </div>

            <div>

                <div class="rounded-md border-4 border-green-700 dark:border-green-600 bg-white dark:bg-neutral-800 overflow-hidden">

                    <div class="px-6 pt-4">

                        <label for="review" class="block text-base font-medium text-gray-900 dark:text-white">
                            @if (!$viewOnly)
                                Tulis ulasan Anda:
                            @else
                                Ulasan Anda:
                            @endif
                        </label>

                        <div class="border-b border-gray-300 dark:border-neutral-600 mt-1"></div>

                    </div>

                    <textarea
                        id="review"
                        wire:model.live="review"
                        rows="5"
                        maxlength="1000"
                        placeholder="Bagaimana kualitas produk? Apakah sesuai deskripsi? Bagaimana hasil penggunaannya?"
                        @disabled($viewOnly)
                        class="w-full resize-none border-0 bg-transparent px-6 py-2 text-sm text-gray-700 dark:text-gray-200 placeholder:text-gray-400 focus:ring-0 focus:outline-none"></textarea>

                </div>

                <div class="flex justify-between px-1 mt-1">
                    @if (!$viewOnly)
                    <span class="text-xs text-gray-400">
                        Ulasan bersifat opsional
                    </span>

                    <span class="text-xs text-gray-400">
                        {{ strlen($review) }}/1000
                    </span>
                    @else
                    <span class="text-xs text-gray-400">
                        Ditulis pada {{ $existingReview->created_at->format('d F Y H:i') }}
                    </span>
                    @endif
                </div>

                @error('review')
                    <p class="text-xs text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="flex justify-end items-center gap-8 mt-4">
                @if (!$viewOnly)
                <button
                    type="button"
                    @click="open = false"
                    wire:click="skip"
                    class="text-base font-medium text-gray-900 dark:text-white hover:text-gray-500 transition hover:scale-105 active:scale-95">
                    NANTI SAJA
                </button>

                <button
                    type="button"
                    wire:click="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="min-w-[110px] px-5 py-2 rounded-md bg-[#EAAA00] hover:bg-yellow-500 text-white font-medium transition disabled:opacity-50 hover:scale-105 active:scale-95">
                    <span wire:loading.remove wire:target="submit">
                        KIRIM
                    </span>

                    <span wire:loading wire:target="submit">
                        Mengirim...
                    </span>
                </button>
                @else
                <button
                    type="button"
                    wire:click="close"
                    class="min-w-[110px] px-5 py-2 rounded-md bg-[#EAAA00] hover:bg-yellow-500 text-white font-medium transition hover:scale-105 active:scale-95"
                >
                OK
                </button>
                @endif


            </div>

        </div>
    </div>

    @endif
</div>

