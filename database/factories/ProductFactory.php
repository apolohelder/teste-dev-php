<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Definir o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'supplier_id' => Supplier::inRandomOrder()->first()->id, // Pegando um fornecedor aleatória
            'user_id' => User::inRandomOrder()->first()->id, // Associando a um usuário existente
            'is_active' => $this->faker->boolean(90), // 90% de chance de ser ativo
        ];
    }
}
