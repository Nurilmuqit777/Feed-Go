<?php

namespace App\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditArticle extends Component
{
    use WithFileUploads;

    public $open = false;
    public $articleId;

    public $user_id;
    public $title;
    public $short_description;
    public $content;
    public $thumbnail;
    public $status;
    public $category_id;
    public $old_thumbnail;
    public $is_featured = false;

    public $categories = [];
    public $users = [];

    protected $listeners = [
        'open-edit-article' => 'open',
        'trix-updated' => 'updateContent',
        'article-category-added' => 'refreshCategories',
    ];

    public function updateContent($value)
    {
    $this->content = $value;
    }

    public function mount()
    {
        $this->refreshCategories();
        $this->refreshUsers();
    }

    public function refreshCategories()
    {
        $this->categories = BlogCategory::orderBy('category')->get();
    }

    public function refreshUsers()
    {
        $this->users = User::orderBy('name')->get();
    }

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'short_description' => 'required|string|max:500',
            'thumbnail' => 'nullable|image|max:512',
            'status' => 'required|in:draft,published',
            'category_id' => 'required|exists:blog_categories,id',
            'is_featured' => 'boolean',
        ];
    }

    public function open($id)
    {
        $article = Blog::findOrFail($id);

        $this->articleId = $article->id;
        $this->user_id = $article->user_id;
        $this->title = $article->title;
        $this->short_description = $article->short_description;
        $this->content = $article->content;
        $this->status = $article->status;
        $this->category_id = $article->category_id;
        $this->old_thumbnail = $article->thumbnail;
        $this->is_featured = $article->is_featured;

        $this->open = true;
        $this->dispatch('trix-load', content: $this->content);
    }

    public function removeImage()
    {
        $this->thumbnail = null;
    }

    public function save()
    {
        $this->validate();

        if ($this->is_featured) {
            $featuredCount = Blog::where('is_featured', true)
                ->where('id', '!=', $this->articleId)
                ->count();

            if ($featuredCount >= 4) {
                $this->addError('is_featured', 'Maksimal hanya 4 artikel yang bisa menjadi featured. Hapus featured dari artikel lain terlebih dahulu.');
                return;
            }
        }
        $thumbnailPath = $this->old_thumbnail;

        if ($this->thumbnail) {
            if ($this->old_thumbnail && Storage::disk('public')->exists($this->old_thumbnail)) {
                Storage::disk('public')->delete($this->old_thumbnail);
            }
            $thumbnailPath = $this->thumbnail->store('articles', 'public');
        }

        $article = Blog::findOrFail($this->articleId);
        $article->update([
            'user_id' => $this->user_id,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'content' => $this->content,
            'thumbnail' => $thumbnailPath,
            'status' => $this->status,
            'is_featured' => $this->is_featured,
            'slug' => Str::slug($this->title),
            'category_id' => $this->category_id,
        ]);

        $this->dispatch('article-updated');
        $this->close();
    }

    public function hydrate()
    {
        $this->refreshCategories();
    }

    public function close()
    {
        $this->reset([
            'articleId',
            'user_id',
            'title',
            'short_description',
            'content',
            'thumbnail',
            'status',
            'is_featured',
            'category_id',
            'old_thumbnail',
        ]);

        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.articles.edit-article');
    }
}
