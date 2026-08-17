<div>
    @if ($carts->isEmpty())
        <div class="flex flex-col items-center justify-center gap-4 py-20">
            <h2 class="text-lg font-semibold text-gray-700">Keranjang Anda kosong</h2>
            <p class="text-gray-500">Tambahkan produk ke keranjang untuk melanjutkan belanja.</p>
            <a href="{{ route('produk') }}" class="mt-4 px-6 py-2 bg-[#EAAA00] hover:bg-yellow-500 text-white rounded-lg transition">
                Kembali ke Produk
            </a>
        </div>
    @else
        <h1 class="text-3xl text-[#2E7D32] font-bold mb-6">Pastikan jumlah dan produk sudah sesuai sebelum melanjutkan ke pembayaran</h1>
        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8">

            <div class="space-y-4">

                @foreach ($carts as $cart)
                <div class="border-2 border-[#CDCDCD] rounded-3xl p-4 md:p-6">
                    <div class="flex flex-col sm:flex-row gap-4 md:gap-6">

                        <div class="w-full sm:w-32 h-48 sm:h-32 rounded-2xl bg-[#6C9D50] flex items-center justify-center shrink-0">
                            <img
                                src="{{ asset('storage/'.$cart->product->product_image1) }}"
                                alt="Produk"
                                class="w-32 sm:w-20 h-auto"
                            >
                        </div>

                        <div class="flex-1 flex flex-col sm:flex-row justify-between text-start gap-4">
                            <div>
                                <h2 class="text-lg md:text-xl text-[#2D5016] font-medium">
                                    {{ $cart->product->product_name }}
                                </h2>
                                <p class="text-[#2D5016] mt-2 text-sm md:text-base">
                                    Jumlah: {{ $cart->quantity }}
                                </p>
                                <div class="flex items-center gap-3 mt-4 md:mt-6">
                                    <h3 class="text-lg font-semibold text-[#2D5016]">
                                        Rp {{ number_format($cart->total_discount_price, 0, ',', '.') }}
                                    </h3>

                                    @if($cart->product->has_discount)
                                        <h3 class="text-base text-[#B0B0B0] line-through">
                                            Rp {{ number_format($cart->total_price, 0, ',', '.') }}
                                        </h3>

                                        <span class="bg-[#E81010] text-white text-xs px-2 py-1 rounded-full">
                                            {{ $cart->product->discount_percentage }}%
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="flex sm:flex-col flex-row-reverse justify-between sm:justify-between sm:items-end items-center">

                                <button wire:click="confirmDelete({{ $cart->id }})" class="text-[#EAAA00] hover:text-yellow-700 hover:scale-115 transition p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                        <path d="M17.25 3H13.5V2.25C13.5 1.65326 13.2629 1.08097 12.841 0.65901C12.419 0.237053 11.8467 0 11.25 0H6.75C6.15326 0 5.58097 0.237053 5.15901 0.65901C4.73705 1.08097 4.5 1.65326 4.5 2.25V3H0.75C0.551088 3 0.360322 3.07902 0.21967 3.21967C0.0790178 3.36032 0 3.55109 0 3.75C0 3.94891 0.0790178 4.13968 0.21967 4.28033C0.360322 4.42098 0.551088 4.5 0.75 4.5H1.5V18C1.5 18.3978 1.65804 18.7794 1.93934 19.0607C2.22064 19.342 2.60218 19.5 3 19.5H15C15.3978 19.5 15.7794 19.342 16.0607 19.0607C16.342 18.7794 16.5 18.3978 16.5 18V4.5H17.25C17.4489 4.5 17.6397 4.42098 17.7803 4.28033C17.921 4.13968 18 3.94891 18 3.75C18 3.55109 17.921 3.36032 17.7803 3.21967C17.6397 3.07902 17.4489 3 17.25 3ZM7.5 14.25C7.5 14.4489 7.42098 14.6397 7.28033 14.7803C7.13968 14.921 6.94891 15 6.75 15C6.55109 15 6.36032 14.921 6.21967 14.7803C6.07902 14.6397 6 14.4489 6 14.25V8.25C6 8.05109 6.07902 7.86032 6.21967 7.71967C6.36032 7.57902 6.55109 7.5 6.75 7.5C6.94891 7.5 7.13968 7.57902 7.28033 7.71967C7.42098 7.86032 7.5 8.05109 7.5 8.25V14.25ZM12 14.25C12 14.4489 11.921 14.6397 11.7803 14.7803C11.6397 14.921 11.4489 15 11.25 15C11.0511 15 10.8603 14.921 10.7197 14.7803C10.579 14.6397 10.5 14.4489 10.5 14.25V8.25C10.5 8.05109 10.579 7.86032 10.7197 7.71967C10.8603 7.57902 11.0511 7.5 11.25 7.5C11.4489 7.5 11.6397 7.57902 11.7803 7.71967C11.921 7.86032 12 8.05109 12 8.25V14.25ZM12 3H6V2.25C6 2.05109 6.07902 1.86032 6.21967 1.71967C6.36032 1.57902 6.55109 1.5 6.75 1.5H11.25C11.4489 1.5 11.6397 1.57902 11.7803 1.71967C11.921 1.86032 12 2.05109 12 2.25V3Z" fill="#EAAA00"/>
                                    </svg>
                                </button>

                                <div class="bg-gray-200 rounded-full px-4 md:px-6 py-2 flex items-center gap-4 md:gap-6">
                                    <button wire:click="decrease({{ $cart->id }})" @disabled($cart->quantity <= 1) class="text-xl leading-none hover:text-[#2D5016] hover:scale-110 active:scale-95 transition w-6 h-6 flex items-center justify-center disabled:opacity-40 disabled:cursor-not-allowed">
                                        <x-svg.minus-icon/>
                                    </button>
                                    <span class="text-lg min-w-[20px] text-center">
                                        {{ $cart->quantity }}
                                    </span>
                                    <button wire:click="increase({{ $cart->id }})" @disabled($cart->quantity >= $cart->product->product_stock) class="text-xl leading-none hover:text-[#2D5016] hover:scale-110 active:scale-95 w-6 h-6 flex items-center justify-center disabled:opacity-40 disabled:cursor-not-allowed">
                                        <x-svg.plus-icon/>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="border-2 border-[#CDCDCD] rounded-3xl p-8 sticky top-5">
                <h2 class="text-2xl font-semibold text-[#2D5016] mb-12">
                    Ringkasan Belanja
                </h2>
                <div class="space-y-6">
                    <div class="flex justify-between">
                        <div class="text-left">
                            <p class="text-md font-medium">
                                {{ $totalItem }} produk
                            </p>
                            <p class="text-md font-medium">
                                Potongan Harga
                            </p>
                        </div>
                        <div class="text-left">
                            <p class="text-md text-gray-500">
                                Rp. {{ number_format($originalTotal, 0, ',', '.') }}
                            </p>
                            <p class="text-md text-gray-500 line-through">
                                Rp. {{ number_format($discountAmount, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-md font-medium">
                            Total Pembayaran
                        </span>
                        <span class="text-lg font-semibold text-[#6B7280]">
                            Rp {{ number_format($subTotal, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
                <a
                    href="{{ route('user.checkout') }}" class="flex items-center justify-center w-full mt-12 bg-[#EAAA00] hover:bg-yellow-500 hover:scale-105 active:scale-95 text-white py-4 rounded-xl text-xl font-medium transition"
                >
                    Lanjutkan Pembayaran
                </a>
                <p class="text-center text-gray-500 text-xs mt-16">
                    Pesanan akan diproses setelah pembayaran dikonfirmasi.
                </p>
            </div>
        </div>
    @endif

    @if($showDeleteModal)

    <div
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
        wire:click.self="$set('showDeleteModal', false)"
    >

        <div
            class="bg-white rounded-3xl w-full max-w-md p-8 shadow-2xl">

            <div class="flex justify-center mb-5">

                <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-10 h-10 text-red-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </div>

            </div>

            <h2 class="text-2xl font-bold text-center text-[#2D5016]">
                Hapus Produk?
            </h2>

            <p class="text-center text-gray-500 mt-3">
                Produk akan dihapus dari keranjang.
                Tindakan ini tidak dapat dibatalkan.
            </p>

            <div class="flex gap-4 mt-8">

                <button
                    wire:click="$set('showDeleteModal', false)"
                    class="flex-1 border border-gray-300 py-3 rounded-xl hover:bg-gray-100 transition hover:scale-105 active:scale-95">

                    Batal

                </button>

                <button
                    wire:click="remove"
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl transition hover:scale-105 active:scale-95">

                    Hapus

                </button>

            </div>

        </div>

    </div>

    @endif
</div>
