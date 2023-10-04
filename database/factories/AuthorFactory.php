<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author; // Убедитесь, что путь к модели "Author" указан правильно

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'photo' => 'path/to/author/photo.jpg', // Замените на реальный путь к фото автора
        ];
    }

}
