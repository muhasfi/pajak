<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\item>
 */
class itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'category_id' => $this->faker->numberBetween(1, 2),
            'description' => $this->faker->text(),
            'img' => fake()->randomElement(
                ['https://images.unsplash.com/photo-1591325418441-ff678baf78ef',
                'https://plus.unsplash.com/premium_photo-1668143358351-b20146dbcc02',
                'https://images.unsplash.com/photo-1738681335816-8e0df0aa9824']
            ),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
