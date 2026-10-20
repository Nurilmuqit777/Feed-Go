@section('title', 'NewsLetter')
<div class="w-full">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-black dark:text-white">
            Newsletter
        </h1>

        <p class="mt-1 text-sm text-black dark:text-white">
            Kirim informasi terbaru FeedGo kepada pelanggan.
        </p>
    </div>

    @if (session('newsletter_success'))
        <div class="mb-6 rounded-xl bg-green-50 p-4 text-sm text-green-700">
            {{ session('newsletter_success') }}
        </div>
    @endif

    <div class="mb-6 rounded-2xl bg-neutral-100 dark:bg-neutral-700 p-5">
        <div class="flex items-center gap-4">

            <div>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Total Pelanggan
                </p>

                <p class="text-2xl font-bold text-yellow-500">
                    {{ $subscriberCount }}
                </p>
            </div>

        </div>
    </div>

    <div class="rounded-2xl bg-neutral-100 dark:bg-neutral-700 p-5 shadow-sm sm:p-6 lg:p-8">

        <form wire:submit="sendNewsletter">

            <div class="mb-6">
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Judul Newsletter
                </label>

                <input
                    type="text"
                    wire:model="title"
                    placeholder="Contoh: Update Produk Terbaru FeedGo"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100">

                @error('title')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">

                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Isi Newsletter
                </label>

                <input id="newsletter_content" type="hidden" wire:model="content">

                <div wire:ignore>
                    <trix-editor input="newsletter_content" class="trix-content min-h-[250px] rounded-xl border border-gray-300"></trix-editor>
                </div>

                @error('content')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="w-full rounded-xl bg-[#1B601E] px-6 py-3 text-sm font-semibold text-white transition hover:bg-green-700 disabled:cursor-not-allowed disabled:opacity-60 sm:w-auto hover:scale-105 active:scale-95">
                    <span wire:loading.remove>
                        Kirim Newsletter
                    </span>

                    <span wire:loading>
                        Loading...
                    </span>
                </button>

            </div>

        </form>

    </div>
@script
<script>
const trixEditor = document.querySelector(
    'trix-editor[input="newsletter_content"]'
);

if (trixEditor) {
    trixEditor.addEventListener('trix-change', function () {
        $wire.set('content', this.editor.getDocument().toString());
    });
}
</script>
@endscript
</div>
