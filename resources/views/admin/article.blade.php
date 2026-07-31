@section('title', 'Artikel')

<x-layouts.app :title="__('Artikel')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <h1 class="font-semibold text-3xl">Artikel FeedGo</h1>
            <span class="font-light">Kelola artikel edukasi, tips, dan informasi seputar pakan ternak</span>
        </div>
        <div class="relative flex flex-col rounded-xl border border-neutral-200 dark:border-neutral-700">

            <livewire:admin.articles.article-table />
            <livewire:admin.articles.add-article />
            <livewire:admin.articles.add-article-category />
            <livewire:admin.articles.edit-article />
            <livewire:admin.articles.delete-article />
        </div>
    </div>

<script>
document.addEventListener('trix-change', function (event) {
    Livewire.dispatch('trix-updated', event.target.value)
})
</script>

</x-layouts.app>
