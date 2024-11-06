@extends('layouts.default')

@section('content')
    <div class="container pt-5">

        <div class="row pt-5">

            <div class="col-md-6 offset-md-3">

                <x-titlepage text="Cadastrar Novo Produto" />

                <form action="{{ route('products.store') }}" method="POST" autocomplete="off">

                    @csrf

                    <x-input typeinput="text" text="Nome do Produto" infor="name" placeholder="Nome do Produto"
                        value="{{ old('name') }}" />

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="supplier_id" name="supplier_id"
                                    aria-label="Floating label select example">
                                    <option selected hidden value="">Selecione</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="supplier_id">Fornecedor</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="is_active" name="is_active"
                                    aria-label="Floating label select example">
                                    <option selected hidden value="">Selecione</option>
                                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Sim</option>
                                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Não</option>
                                </select>
                                <label for="is_active">Ativo</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">R$</span>
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="price" name="price" step="0.01"
                                        value="{{ old('price') }}" placeholder="Valor do produto">
                                    <label for="price">Valor do produto</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Descrição do Produto" id="description" name="description"
                            style="height: 100px">
                            {{ old('description') }}
                        </textarea>
                        <label for="floatingTextarea2">Descrição do Produto</label>
                    </div>

                    <x-btnsubmit text="Salvar Alterações" />
                </form>
            </div>
        </div>
    </div>
@endsection
