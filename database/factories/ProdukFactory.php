<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaProduk'        => fake()->text(),
            'hargaProduk'       => fake()->numerify(),
            'deskripsiProduk'   => fake()->text(),
            'gambarProduk'   => fake()->text(),
            'category_id' => Category::Factory()
        ];
    }
}
