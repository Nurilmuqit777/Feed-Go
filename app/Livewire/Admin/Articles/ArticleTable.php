<?php

namespace App\Livewire\Admin\Articles;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;

class ArticleTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'article-added' => '$refresh',
        'article-updated' => '$refresh',
        'article-deleted' => '$refresh',
    ];

    public function updateStatus($articleId, $status)
    {
    if (! in_array($status, ['draft', 'published'])) {
        return;
    }

    Blog::where('id', $articleId)->update([
        'status' => $status,
    ]);

    $this->dispatch('article-updated');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getArticlesProperty()
    {
        return Blog::with(['category', 'user'])
            ->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.articles.article-table', [
            'articles' => $this->articles,
        ]);
    }
}
