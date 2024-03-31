<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()->count(100)->create()->each(function ($book) {
            $faker = Faker::create();
            $limit = $faker->numberBetween(1,3);
            $authors = Author::inRandomOrder()->take($limit)->get();
            foreach ($authors as $author) {
                $book->authors()->attach($author);
            }
        });
    }
}

