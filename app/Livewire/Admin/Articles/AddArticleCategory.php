<?php

namespace App\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\BlogCategory;

class AddArticleCategory extends Component
{

    public $open = false;
    public $category = '';
    public $categories = [];

    public $categoryToDelete = null;

    protected $listeners = [
        'open-add-article-category' => 'open',
        'close-article-category-modal' => 'close',
    ];

    protected $rules = [
        'category' => 'required|string|max:255|unique:blog_categories,category',
    ];

    public function open()
    {
        $this->dispatch('close-article-modal')
            ->to('admin.articles.add-article');

        $this->loadCategories();

        $this->open = true;
    }

    public function close()
    {
        $this->reset();
        $this->open = false;
    }

    public function loadCategories()
    {
        $this->categories = BlogCategory::orderBy('category')->get();
    }

    public function save()
    {
        $this->validate();

        BlogCategory::create([
            'category' => strtoupper($this->category),
        ]);

        $this->dispatch('article-category-added');

        $this->reset('category');

        $this->loadCategories();
    }

    public function confirmDelete($id)
    {
        $this->categoryToDelete = $id;
    }

    public function cancelDelete()
    {
        $this->categoryToDelete = null;
    }

    public function deleteCategory()
    {
        if (!$this->categoryToDelete) {
            return;
        }

        $category = BlogCategory::find($this->categoryToDelete);

        if ($category) {
            $category->delete();
        }

        $this->categoryToDelete = null;

        $this->loadCategories();
    }

    public function render()
    {
        return view('livewire.admin.articles.add-article-category');
    }
}
