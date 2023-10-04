<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Book;

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
            'title' => $this->faker->sentence,
            'author_id' => \App\Models\Author::factory()->create()->id, // Используем фабрику для создания связанного автора
            'image' => 'path/to/book/image.jpg', // Замените на реальный путь к обложке книги
        ];
    }
}
