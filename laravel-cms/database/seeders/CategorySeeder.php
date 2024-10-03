<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach (CategoryFactory::CATEGORIES as $key => $categoryName) {
            $category = Category::create([
                'name' => $categoryName,
                'order' => ++$key
            ]);

            Article::factory(3)->create([
                'category_id' => $category->id,
                'user_id' => $users->random()->id,
            ])->each(function(Article $article) use($users){
                $article->tags()->attach(Tag::inRandomOrder()->limit(rand(2,4))->pluck('id'));

                Comment::factory(3)->create([
                    'article_id' => $article->id,
                    'user_id' => $users->random()->id
                ]);
            });
        }
    }
}
