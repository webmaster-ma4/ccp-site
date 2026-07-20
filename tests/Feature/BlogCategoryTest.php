<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_page_can_filter_posts_by_category(): void
    {
        $category = Category::create([
            'name' => 'Climate',
            'slug' => 'climate',
        ]);

        $otherCategory = Category::create([
            'name' => 'Energy',
            'slug' => 'energy',
        ]);

        Post::create([
            'title' => 'First article',
            'slug' => 'first-article',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'published_at' => now(),
            'category_id' => $category->id,
        ]);

        Post::create([
            'title' => 'Second article',
            'slug' => 'second-article',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'published_at' => now(),
            'category_id' => $otherCategory->id,
        ]);

        $response = $this->get('/fr/blog/category/climate');

        $response->assertOk();
        $response->assertSee('First article');
        $response->assertDontSee('Second article');
    }
}
