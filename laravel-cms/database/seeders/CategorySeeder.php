<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public const CATEGORIES = ['News', 'Life', 'Entertainment', 'Finance', 'Sports'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach (self::CATEGORIES as $key => $category) {
            Category::create([
                'name' => $category,
                'order' => $key++
            ])->each(function(Category $cat) use ($users){
                Article::factory(5)->create([
                    'category_id' => $cat->id,
                    'user_id' => $users->random()->id
                ])->each(function(Article $article) use($users){
                    
                    $article->tags()->attach(Tag::factory(2));

                    Comment::factory(2)->create([
                        'article_id' => $article->id,
                        'user_id' => $users->random()->id
                    ]);
                });
            });
        }
    }
}
