<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Blog;

class ArticleSearch extends Component
{
    public $search = '';
    public $showResults = false;

    public function updatedSearch()
    {
        $this->showResults = strlen($this->search) > 0;
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->showResults = false;
    }

    public function render()
    {
        $results = collect();

        if (strlen($this->search) >= 2) {
            $results = Blog::with(['category', 'user'])
                ->where('status', 'published')
                ->where(function($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                          ->orWhere('short_description', 'like', '%' . $this->search . '%')
                          ->orWhereHas('category', function($q) {
                              $q->where('category', 'like', '%' . $this->search . '%');
                          });
                })
                ->latest()
                ->take(5)
                ->get();
        }

        return view('livewire.user.article-search', [
            'results' => $results
        ]);
    }
}
