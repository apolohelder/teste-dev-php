@extends('layouts.default')

@section('content')
    <div class="container pt-5">
        <h1 class="mb-1">Fornecedor {{ $supplier->name }}</h1>

        <ul class="list-unstyled row row-cols-3">
            <li class="col">Nome fantasia: {{ $supplier->nome_fantasia }}</li>
            <li class="col">CPF: {{ $supplier->cpf }}</li>
            <li class="col">CNPJ: {{ $supplier->cnpj }}</li>
            <li class="col">Situação cadastral Ativa:
                {{ $supplier->descricao_situacao_cadastral === 'Ativa' ? 'Sim' : 'Não' }}</li>
            <li class="col">Data da situação cadastral: {{ $supplier->data_situacao_cadastral }}</li>
            <li class="col">Código da natureza jurídica: {{ $supplier->codigo_natureza_juridica }}</li>
            <li class="col">Data de início de atividade: {{ $supplier->data_inicio_atividade }}</li>
            <li class="col">CNAE fiscal: {{ $supplier->cnae_fiscal }}</li>
            <li class="col">Logradouro: {{ $supplier->logradouro }}</li>
            <li class="col">Número: {{ $supplier->numero }}</li>
            <li class="col">Complemento: {{ $supplier->complemento }}</li>
            <li class="col">Bairro: {{ $supplier->bairro }}</li>
            <li class="col">CEP: {{ $supplier->cep }}</li>
            <li class="col">UF: {{ $supplier->uf }}</li>
            <li class="col">Telefone: {{ $supplier->ddd_telefone }}</li>
            <li class="col">Criado em: {{ $supplier->created_at }}</li>
            <li class="col">Atualizado em: {{ $supplier->updated_at }}</li>
            <li class="col">Descrição do CNAE fiscal: {{ $supplier->cnae_fiscal_descricao }}</li>
        </ul>

        @if ($products->isEmpty())
            <p>Nenhum produto encontrado para este fornecedor.</p>
        @else
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($products as $product)
                    @if ($product->is_active)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                                    <a href="{{ route('auth.produtos.show', $product->name) }}">Veja mais</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
