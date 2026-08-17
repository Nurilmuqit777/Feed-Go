<?php

namespace App\Livewire\Admin\Articles;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Blog;

class DeleteArticle extends Component
{
    public $open = false;
    public $articleId;
    public $title;

    public $listeners = [
        'open-delete-article' => 'open',
    ];

    public function open($id)
    {
        $article = Blog::findOrFail($id);

        $this->articleId = $article->id;
        $this->title = $article->title;

        $this->open = true;
    }

    public function delete()
    {
        $article = Blog::findOrFail($this->articleId);
        if($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        session()->flash('message', 'Artikel berhasil dihapus.');

        $this->dispatch('article-updated');
        $this->close();
    }

    public function close()
    {
        $this->reset();
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.articles.delete-article');
    }
}
