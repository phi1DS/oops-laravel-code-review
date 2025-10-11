<?php

namespace Modules\Post\Services;

use Illuminate\Support\Facades\Http;
use Modules\Post\Models\Post;

class SharePostToExternalApiService
{
    protected string $endpoint;

    protected string $apiToken;

    public function __construct()
    {
        $this->endpoint = 'https://external-api.example.com/api';
        $this->apiToken = 'XqUhs6dgq5JDckvc2';
    }

    public function share(Post $post): bool
    {
        // The next 3 lines are for exercice purposes, please ignore them
        Http::fake([
            'external-api.example.com/*' => Http::response(['status' => 'ok'], 200),
        ]);

        $payload = [
            'title' => $post->title,
            'content' => $post->content,
            'slug' => $post->slug,
            'author' => $post->created_by_name,
            'published_at' => $post->published_at,
        ];

        Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$this->apiToken,
        ])
            ->post($this->endpoint.'/posts', $payload);

        return true;
    }
}
