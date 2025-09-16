<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemDetailFactory extends Factory
{
    public function definition(): array
    {
        $categoryId = Item::inRandomOrder()->first()->category_id ?? 1;

        return [
            'item_id' => Item::factory(), // otomatis bikin item baru kalau dipanggil sendiri
            'file_path' => $categoryId == 1 ? $this->faker->url() : null,  // contoh ebook/article
            'video_url' => $categoryId == 2 ? "https://youtube.com/watch?v=" . $this->faker->bothify('???###') : null, // course
            'zoom_link' => $categoryId == 3 ? "https://zoom.us/j/" . $this->faker->numerify('##########') : null, // seminar
            'event_date' => $categoryId == 3 ? $this->faker->dateTimeBetween('+1 days', '+1 month') : null,
            'duration_days' => $this->faker->randomElement([7, 14, 30]),
        ];
    }
}
