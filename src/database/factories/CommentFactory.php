<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersQty = User::all()->count();
        $booksQty = Book::all()->count();

        return [
            'user_id' => fake()->numberBetween(1, $usersQty),
            'book_id' => fake()->numberBetween(1, $booksQty),
            'description' => fake()->text(1000)
        ];
    }
}
