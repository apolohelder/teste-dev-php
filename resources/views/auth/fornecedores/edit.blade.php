@extends('layouts.default')

@section('content')
    <div class="container pt-5">

        <div class="row pt-5">

            <div class="col-md-6 offset-md-3">

                <x-titlepage text="Editar fornecedor" />

                <form class="pt-4" action="{{ route('suppliers.update', $supplier->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <x-input typeinput="text" text="Nome do fornecedor" infor="name" placeholder="Nome do fornecedor"
                        value="{{ old('name', $supplier->name) }}" />
                    <x-input typeinput="text" text="CNPJ" infor="cnpj" placeholder="CNPJ"
                        value="{{ old('cnpj', $supplier->cnpj) }}" />
                    <x-input typeinput="text" text="CPF" infor="cpf" placeholder="CPF"
                        value="{{ old('cpf', $supplier->cpf) }}" />
                    <x-input typeinput="text" text="Nome Fantasia" infor="nome_fantasia" placeholder="Nome Fantasia"
                        value="{{ old('nome_fantasia', $supplier->nome_fantasia) }}" />
                    <x-input typeinput="text" text="Descrição da Situação Cadastral" infor="descricao_situacao_cadastral"
                        placeholder="Situação Cadastral"
                        value="{{ old('descricao_situacao_cadastral', $supplier->descricao_situacao_cadastral) }}" />
                    <x-input typeinput="date" text="Data da Situação Cadastral" infor="data_situacao_cadastral"
                        placeholder="Data da Situação Cadastral"
                        value="{{ old('data_situacao_cadastral', $supplier->data_situacao_cadastral) }}" />
                    <x-input typeinput="number" text="Código da Natureza Jurídica" infor="codigo_natureza_juridica"
                        placeholder="Código da Natureza Jurídica"
                        value="{{ old('codigo_natureza_juridica', $supplier->codigo_natureza_juridica) }}" />
                    <x-input typeinput="date" text="Data de Início de Atividade" infor="data_inicio_atividade"
                        placeholder="Data de Início de Atividade"
                        value="{{ old('data_inicio_atividade', $supplier->data_inicio_atividade) }}" />
                    <x-input typeinput="text" text="CNAE Fiscal" infor="cnae_fiscal" placeholder="CNAE Fiscal"
                        value="{{ old('cnae_fiscal', $supplier->cnae_fiscal) }}" />
                    <x-input typeinput="text" text="Descrição do CNAE Fiscal" infor="cnae_fiscal_descricao"
                        placeholder="Descrição do CNAE Fiscal"
                        value="{{ old('cnae_fiscal_descricao', $supplier->cnae_fiscal_descricao) }}" />
                    <x-input typeinput="text" text="Logradouro" infor="logradouro" placeholder="Logradouro"
                        value="{{ old('logradouro', $supplier->logradouro) }}" />
                    <x-input typeinput="text" text="Número" infor="numero" placeholder="Número"
                        value="{{ old('numero', $supplier->numero) }}" />
                    <x-input typeinput="text" text="Complemento" infor="complemento" placeholder="Complemento"
                        value="{{ old('complemento', $supplier->complemento) }}" />
                    <x-input typeinput="text" text="Bairro" infor="bairro" placeholder="Bairro"
                        value="{{ old('bairro', $supplier->bairro) }}" />
                    <x-input typeinput="text" text="CEP" infor="cep" placeholder="CEP"
                        value="{{ old('cep', $supplier->cep) }}" />
                    <x-input typeinput="text" text="UF" infor="uf" placeholder="UF"
                        value="{{ old('uf', $supplier->uf) }}" />
                    <x-input typeinput="text" text="DDD Telefone" infor="ddd_telefone" placeholder="DDD Telefone"
                        value="{{ old('ddd_telefone', $supplier->ddd_telefone) }}" />

                    <x-btnsubmit text="Atualizar fornecedor" />

                </form>

            </div>

        </div>

    </div>
@endsection
