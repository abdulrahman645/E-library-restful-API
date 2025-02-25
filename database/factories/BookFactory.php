<?php

namespace Database\Factories;
use App\Models\Author;
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
            'name' => fake()->sentence,
            'author_id' => fake()->numberBetween(1,100),
            'description' => fake()->paragraph,
            'cover_image' => "http://192.168.43.84:8000/storage/app/images/kmocUTCqUlDGe7WI3NB9c4t4FyrJDpmPoj2dy5no.jpg",
            'array_image' => json_encode(["http://192.168.43.84:8000/images/kmocUTCqUlDGe7WI3NB9c4t4FyrJDpmPoj2dy5no.jpg", "http://192.168.43.84:8000/images/kmocUTCqUlDGe7WI3NB9c4t4FyrJDpmPoj2dy5no.jpg"]), // Generate an array of image URLs
            'price' => fake()->numberBetween(10, 100),
            'quantity_sell' => fake()->numberBetween(0, 100),
            'quantity_reservation' => fake()->numberBetween(0, 100),
            'pdf' => "pdfs/9x1EBuBUqrNywWuUwe55qpWj8YKY1pzUbXD1ShyU.pdf",
            'sound_book' => "audios/ee2g792aFPWPycSMthKtaX6gxH7PH5reQDvYKiKa.mp3",
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
