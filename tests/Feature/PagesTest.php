<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;

class PagesTest extends TestCase
{
    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Climate Catalyst');
    }

    public function test_about_page_is_available_in_french(): void
    {
        $response = $this->get('/fr/about');

        $response->assertStatus(200);
        $response->assertSee('À propos');
    }

    public function test_blog_page_displays_articles(): void
    {
        $response = $this->get('/en/blog');

        $response->assertStatus(200);
        $response->assertSee('Climate stories');
    }

    public function test_post_detail_page_is_available(): void
    {
        $post = Post::factory()->create([
            'slug' => 'climate-innovation-across-borders',
            'title' => 'Climate innovation across borders',
            'excerpt' => 'A practical story about scaling climate action.',
            'content' => 'Real content for the article detail page.',
        ]);

        $response = $this->get('/en/blog/' . $post->slug);

        $response->assertStatus(200);
        $response->assertSee($post->title);
    }
}
