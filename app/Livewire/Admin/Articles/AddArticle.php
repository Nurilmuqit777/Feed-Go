<?php

namespace App\Livewire\Admin\Articles;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AddArticle extends Component
{
    use WithFileUploads;

    public $open = false;
    public $user_id;
    public $title;
    public $content;
    public $short_description;
    public $thumbnail;
    public $status;
    public $category_id;
    public $is_featured = false;

    public $categories =[];
    public $users =[];

    protected $listeners = [
        'open-add-article' => 'open',
        'close-article-modal' => 'close',
        'trix-updated' => 'setContent',
        'article-category-added' => 'refreshCategories',
    ];

    public function setContent($content)
    {
        $this->content = $content;
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'short_description' => 'required|string|max:500',
        'content' => 'required|string',
        'thumbnail' => 'required|image|max:512',
        'status' => 'required|in:draft,published',
        'category_id' => 'required|exists:blog_categories,id',
        'is_featured' => 'boolean',
    ];

    public function mount()
    {
        $this->categories = BlogCategory::orderBy('category')->get();
        $this->users = User::orderBy('name')->get();
    }

    public function refreshCategories()
    {
        $this->categories = BlogCategory::orderBy('category')->get();
    }

    public function refreshUsers()
    {
        $this->users = User::orderBy('name')->get();
    }

    public function save()
    {
        $this->validate();

        if ($this->is_featured) {
            $featuredCount = Blog::where('is_featured', true)->count();
            if ($featuredCount >= 4) {
                $this->addError('is_featured', 'Maksimal hanya 4 artikel yang bisa menjadi featured. Hapus featured dari artikel lain terlebih dahulu.');
                return;
            }
        }
        $thumbnailPath = null;
        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('articles', 'public');
        }

        Blog::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'short_description' => $this->short_description,
            'content' => $this->content,
            'thumbnail' => $thumbnailPath,
            'status' => $this->status,
            'is_featured' => $this->is_featured,
            'slug' => Str::slug($this->title),
            'category_id' => $this->category_id,
        ]);

        $this->dispatch('article-added');
        $this->close();
        $this->reset([
            'title',
            'short_description',
            'content',
            'thumbnail',
            'status',
            'is_featured',
            'category_id',
        ]);
        $this->open = false;
    }

    public function removeImage()
    {
    $this->thumbnail = null;
    }

    public function open()
    {
        $this->dispatch('close-article-modal')->to('admin.articles.add-article-category');
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
        $this->reset([
            'title',
            'short_description',
            'content',
            'thumbnail',
            'status',
            'category_id',
            'is_featured',
        ]);
    }

    public function hydrate()
    {
    $this->refreshCategories();
    }

    public function render()
    {
        return view('livewire.admin.articles.add-article');
    }
}
