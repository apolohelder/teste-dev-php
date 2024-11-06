<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    /**
     * Executar as seeds do banco de dados.
     */
    public function run(): void
    {
        // Criando fornecedores
        Supplier::factory()->count(7)->create();

        // Criando produtos
        Product::factory(100)->create();
    }
}
