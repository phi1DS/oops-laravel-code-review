<?php

namespace Modules\Post\Repositories;

use Modules\Post\Models\Post;
use Illuminate\Support\Collection;
use Modules\Category\Models\Category;

class PostRepository
{
    public static function getByCategoryId(int $categoryId, int $limit = 10): Collection
    {
        $posts = Post::where('category_id', $categoryId)
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();

        foreach($posts as $post) {
            $post->category_name = Category::where('id', $post->category_id)->first()->name;
        }

        return $posts;
    }
}
