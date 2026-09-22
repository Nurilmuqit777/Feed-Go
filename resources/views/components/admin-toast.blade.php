<div
    x-data="{
        show: false,
        title: '',
        message: '',
        type: 'success',
        timeout: null,

        open(event) {
            this.title = event.detail.title ?? '';
            this.message = event.detail.message ?? '';
            this.type = event.detail.type ?? 'success';

            this.show = true;

            clearTimeout(this.timeout);

            this.timeout = setTimeout(() => {
                this.show = false;
            }, 5000);
        }
    }"

    x-on:show-toast.window="open($event)"

    x-show="show"
    x-cloak

    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-10"
    x-transition:enter-end="opacity-100 translate-x-0"

    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-10"

    class="fixed left-6 top-6 z-[9999] w-[calc(100%-3rem)] max-w-[500px]"
>
    <div class="flex items-center gap-8 rounded-[28px] border-2 border-[#D5D8D0] bg-white dark:bg-neutral-700 px-8 py-6 shadow-[0_8px_30px_rgba(0,0,0,0.08)]">

        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-[#B7F2A8]">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#175B1C]">
                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12.5l4.5 4.5L19 7.5"/>
                </svg>
            </div>
        </div>

        <div class="min-w-0 flex-1">
            <h3 class="text-lg font-semibold leading-tight text-[#252525] dark:text-gray-400" x-text="title"></h3>
            <p class="mt-2 text-sm leading-relaxed text-[#5D5D5D] dark:text-gray-200" x-text="message"></p>
        </div>

        <button
            type="button"
            @click="show = false"
            class="shrink-0 text-bg-neutral-500 transition hover:scale-110 hover:text-neutral-400 active:scale-95">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/>
            </svg>
        </button>

    </div>
</div>
