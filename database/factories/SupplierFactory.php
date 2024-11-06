<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'cnpj' => $this->faker->unique()->numerify('########0001##'),
            'cpf' => $this->faker->optional()->numerify('###########'),
            'nome_fantasia' => $this->faker->companySuffix,
            'descricao_situacao_cadastral'  => $this->faker->boolean,
            'data_situacao_cadastral' => $this->faker->date('Y-m-d', 'now'),
            'codigo_natureza_juridica' => $this->faker->numberBetween(1000, 9999),
            'data_inicio_atividade' => $this->faker->date('Y-m-d', '-10 years'),
            'cnae_fiscal' => $this->faker->numerify('#######'),
            'cnae_fiscal_descricao' => 'Atividades de associações de defesa de direitos sociais',
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'complemento' => $this->faker->optional()->secondaryAddress,
            'bairro' => $this->faker->citySuffix,
            'cep' => $this->faker->postcode,
            'uf' => $this->faker->stateAbbr,
            'ddd_telefone' => $this->faker->phoneNumber,
        ];
    }
}
