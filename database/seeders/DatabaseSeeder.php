<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Author::factory(10)->create();

        Category::factory(6)->create();

        Book::factory(20)->create();

        User::factory(1)->create();
    }
}
