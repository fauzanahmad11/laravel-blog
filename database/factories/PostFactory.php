<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 3),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // cara paling biasa
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',
            // Arrow Function
            // 'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
            //     ->map(fn ($p) => "<p>$p</p>")->implode(''),
            // Function biasa
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(function ($p) {
                    return "<p>$p</p>";
                })->implode(''),
            'published_at' => '2021-10-03 08:59:18'
        ];
    }
}
