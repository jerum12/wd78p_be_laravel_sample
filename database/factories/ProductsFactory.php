<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Products::class;
    public function definition(): array
    {
        return [
            'product_name'=> $this->faker->name(),
            'product_description' => $this->faker->text(),
            'amount'=>  $this->faker->numberBetween(0,1000),
            'currency'=> $this->faker->currencyCode()
        ];
    }
}
