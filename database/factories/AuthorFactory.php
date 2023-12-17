<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class AuthorFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'country' => 'Russia',
            'description' => 'Описание для автора!',
            'image' => 'https://audiostories.ru/images/artists/leuiss-keroll.jpg'
        ];
    }
}
