<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "Книга " . $this->faker->name(),
            'year' =>  $this->faker->numberBetween(1950, 2023),
            'image' => "https://libcat.ru/uploads/posts/book/dzhillian-bratstvo-konnora.jpg",
            'description' => 'Описание для книги!',

            'user_id' => 1,
            'author_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
