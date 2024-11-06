<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cnpj', 'cpf', 'nome_fantasia', 'descricao_situacao_cadastral',
        'data_situacao_cadastral', 'codigo_natureza_juridica', 'data_inicio_atividade',
        'cnae_fiscal', 'cnae_fiscal_descricao', 'logradouro', 'numero', 'complemento',
        'bairro', 'cep', 'uf', 'ddd_telefone'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    // Acessor para formatar o CNPJ
    public function getCnpjAttribute($value)
    {
        return $this->formatCnpj($value);
    }

    // Acessor para formatar o CPF
    public function getCpfAttribute($value)
    {
        return $this->formatCpf($value);
    }

    // Método para formatar o CNPJ
    private function formatCnpj($cnpj)
    {
        return preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', $cnpj);
    }

    // Método para formatar o CPF
    private function formatCpf($cpf)
    {
        return preg_replace('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '$1.$2.$3-$4', $cpf);
    }
}
