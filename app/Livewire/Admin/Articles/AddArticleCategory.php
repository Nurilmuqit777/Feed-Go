<?php

namespace App\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\BlogCategory;

class AddArticleCategory extends Component
{
        
    public $open = false;
    public $category = '';

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

        $this->open = true;
    }

    public function close()
    {
        $this->reset();
        $this->open = false;
    }

    public function save()
    {
        $this->validate();

        BlogCategory::create([
            'category' => strtoupper($this->category),
        ]);

        $this->dispatch('article-category-added');
        $this->close();
    }

    public function render()
    {
        return view('livewire.admin.articles.add-article-category');
    }
}
