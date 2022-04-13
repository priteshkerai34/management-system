<?php

namespace Database\Factories;

use App\Models\items;
use Illuminate\Database\Eloquent\Factories\Factory;

class itemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = items::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'url_items' => $this->faker->word,
        'current_price' => $this->faker->word,
        'Regular_price' => $this->faker->word,
        'available_stock' => $this->faker->randomDigitNotNull,
        'description' => $this->faker->word,
        'item_visibility' => $this->faker->word,
        'item_tax_category' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
