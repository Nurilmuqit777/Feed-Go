<div>
    <div class="flex item-center gap-2 flex-1 border-3 rounded-lg px-4 py-2 w-full focus-within:ring-0 focus-within:ring-[#2E7D32] focus-within:border-[#2E7D32] transition max-w-md bg-[#D9D9D9]">
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
</div>
