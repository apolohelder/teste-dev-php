@extends('layouts.default')

@section('content')
    <div class="container h-75">

        <div class="row py-4">
            <div class="col">
                <x-titlepage text="Lista de fornecedores" />
            </div>
            <div class="col text-end">
                <x-btnadd text="Adicionar fornecedor" btnHref="{{ route('suppliers.create') }}" />
            </div>
        </div>

        <div class="row pt-5">

            <div class="col-md-8 offset-md-2">

                <x-search textSearch="Buscar por fornecedor" />

                @if ($suppliers->count() > 0)
                    <table id="listItem" class="table table-hover">

                        <thead>

                            <tr>
                                <th><span class="text-secondary">Nome da fornecedor</span></th>
                                <th><span class="text-secondary">CNPJ</span></th>
                                <th class="text-end"><span class="text-secondary">Ações</span></th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>

                                    <td>
                                        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                            href="{{ route('suppliers.show', $supplier->name) }}">
                                            {{ $supplier->name }}
                                        </a>
                                    </td>
                                    <td><span class="text-secondary">{{ $supplier->cnpj }}</span></td>
                                    <td class="text-end">
                                        <x-btnedit btnHref="{{ route('suppliers.edit', $supplier->id) }}" />

                                        <x-btndelete actionBtn="{{ route('suppliers.destroy', $supplier->id) }}"
                                            aletbtn="Tem certeza que deseja excluir este fornecedor?" />
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                @else
                    <div class="h-75 d-flex align-items-center">
                        <p class="lead text-center w-100">Sem fornecedor cadastrado</p>
                    </div>
                @endif

            </div>

        </div>

    </div>
@endsection
