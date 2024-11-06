<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->string('cnpj')->unique();
            $table->string('cpf')->nullable();
            $table->string('nome_fantasia');
            $table->string('descricao_situacao_cadastral')->number();
            $table->date('data_situacao_cadastral');
            $table->integer('codigo_natureza_juridica');
            $table->date('data_inicio_atividade');
            $table->string('cnae_fiscal');
            $table->string('cnae_fiscal_descricao');
            $table->string('logradouro');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cep');
            $table->string('uf', 2);
            $table->string('ddd_telefone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn([
                'name', 'cnpj', 'cpf', 'nome_fantasia', 'descricao_situacao_cadastral',
                'data_situacao_cadastral', 'codigo_natureza_juridica', 'data_inicio_atividade',
                'cnae_fiscal', 'cnae_fiscal_descricao', 'logradouro', 'numero', 
                'complemento', 'bairro', 'cep', 'uf', 'ddd_telefone'
            ]);
        });
    }
};
