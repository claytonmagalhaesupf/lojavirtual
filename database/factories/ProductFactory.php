<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $type = Type::firstOrCreate([
            'name' => 'Geral',
        ]);

        return [
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(10),
            'quantity' => fake()->numberBetween(1, 200),
            'price' => fake()->randomFloat(2, 10, 1000),
            'image' => null,
            'type_id' => $type->id,
        ];
    }
}