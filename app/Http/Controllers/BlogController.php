<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredArticles = Blog::with(['category','user'])->where('status', 'published')->where('is_featured', true)->latest()->take(4)->get();
        if ($featuredArticles->count() < 4) {
            $remaining = 4 - $featuredArticles->count();
            $additionalArticles = Blog::with(['category', 'user'])
                ->where('status', 'published')
                ->where('is_featured', false)
                ->latest()
                ->take($remaining)
                ->get();

            $featuredArticles = $featuredArticles->merge($additionalArticles);
        }

        $popularArticles = Blog::with(['category','user'])->where('status', 'published')->orderBy('views', 'desc')->take(2)->get();
        $trendingArticles = Blog::with(['category','user'])->where('status', 'published')->where('created_at', '>=', now()->subDays(7))->orderBy('views', 'desc')->take(3)->get();
        if ($trendingArticles->count() < 3) {
            $remaining = 3 - $trendingArticles->count();
            $additionalTrending = Blog::with(['category', 'user'])
                ->where('status', 'published')
                ->where('created_at', '>=', now()->subDays(30))
                ->whereNotIn('id', $trendingArticles->pluck('id'))
                ->orderBy('views', 'desc')
                ->take($remaining)
                ->get();

            $trendingArticles = $trendingArticles->merge($additionalTrending);
        }

        return view('layouts.blogs', compact('popularArticles', 'trendingArticles', 'featuredArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $blog = Blog::with(['category', 'user'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

                $keywords = explode(' ', $blog->title);

        $relatedArticles = Blog::with(['category', 'user'])
            ->where('status', 'published')
            ->where('id', '!=', $blog->id)
            ->where(function($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                     if (strlen($keyword) > 3) {
                    $q->orWhere('title', 'like', '%' . $keyword . '%');
                }
                }
            })
            ->latest()
            ->take(3)
            ->get();

        if ($relatedArticles->count() < 3) {
        $additional = Blog::where('status', 'published')
            ->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3 - $relatedArticles->count())
            ->get();

        $relatedArticles = $relatedArticles->merge($additional);
        }

        $sessionKey = 'article_viewed_' . $blog->id;
        if (!session()->has($sessionKey)) {
        $blog->incrementViews();
        session()->put($sessionKey, true);
        }
        return view('layouts.blog-detail', compact('blog','relatedArticles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
