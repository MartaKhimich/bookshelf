<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_author')->insert(
            $this->getData()
        );
    }

    private function getData(): array
    {
        $booksQty = Book::all()->count();
        $authorsQty = Author::all()->count();
        $book_author = [];

        for ($i = 1; $i <= $booksQty; $i++) {

            $book_author[] = [
                'book_id' => fake()->numberBetween(1, $booksQty),
                'author_id' => fake()->numberBetween(1, $authorsQty),
            ];
        }
        return $book_author;
    }
}
