<?php

namespace Database\Seeders;

use App\Helpers\Util;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesAndArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::select('id')->get(10)->pluck('id')->toArray();

        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $category_title = "faker " . $faker->sentence(2);
            $slug = Util::slugify($category_title, 'category');
            if ($slug['status']) {
                $slug = $slug['data']['slug'];
            } else {
                continue;
            }
            $category = Category::create([
                'name' => $category_title,
                'slug' => $slug,
            ]);
            for ($j = 0; $j < 50; $j++) {
                $article_title = "faker " . $faker->sentence(3);
                $slug = Util::slugify($article_title, 'article');
                if ($slug['status']) {
                    $slug = $slug['data']['slug'];
                } else {
                    continue;
                }
                Article::create([
                    'category_id' => $category->id,
                    'title' => $article_title,
                    'slug' => $slug,
                    'content' => $faker->paragraph(3),
                    'banner' => $faker->imageUrl(640, 480),
                    'user_id' => $user_id[array_rand($user_id)],
                ]);
            }
        }
    }
}
