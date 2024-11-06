@extends('layouts.default')

@section('content')
    <div class="container h-75">
        <div class="row py-4">
            <div class="col">
                <x-titlepage text="Lista de produtos" />
            </div>
            <div class="col text-end">
                <x-btnadd text="Adicionar produto" btnHref="{{ route('products.create') }}" />
            </div>
        </div>

        <div class="row pt-5">

            <div class="col-md-8 offset-md-2">

                <x-search actionSearch="" textSearch="Buscar por produto" />

                @if ($products->count() > 0)
                    <table id="listItem" class="table table-hover">
                        <thead>
                            <tr>
                                <th><span class="text-secondary">Nome do produto</span></th>
                                <th><span class="text-secondary">Status</span></th>
                                <th class="text-end"><span class="text-secondary">Ações</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->is_active ? 'Ativo' : 'Inativo' }}</td>
                                    <td class="text-end">
                                        <x-btnedit btnHref="{{ route('products.edit', $product->id) }}" />

                                        <x-btndelete actionBtn="{{ route('products.destroy', $product->id) }}"
                                            aletbtn="Tem certeza que deseja excluir este produto?" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="h-75 d-flex align-items-center">
                        <p class="lead text-center w-100">Sem produtos</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
