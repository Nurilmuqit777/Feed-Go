<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['user_id', 'title','short_description', 'content', 'thumbnail', 'status', 'is_featured', 'slug', 'views', 'category_id'];
    protected $casts = ['is_featured' => 'boolean', 'views' => 'integer'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
