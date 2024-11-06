@extends('layouts.default')

@section('content')
    <div class="container">

        <div class="row py-4">
            <div class="col">
                <x-titlepage text="Usuários" />
            </div>
            <div class="col text-end">
                <x-btnadd text="Novo Usuário" btnHref="{{ route('users.create') }}" />
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-8 offset-md-2">
                <x-search textSearch="Buscar por usuário" />

                <table id="listItem" class="table table-hover">
                    <thead>
                        <tr>
                            <th><span class="text-secondary">Usuário</span></th>
                            <th class="text-end"><span class="text-secondary">Ações</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-dark">
                                    <strong class="text-secondary">Nome</strong>: {{ $user->name }}<br />
                                    {{ $user->email }}
                                </td>
                                <td class="text-end">
                                    @if (Auth::user()->id !== $user->id)
                                        <x-btnedit btnHref="{{ route('users.edit', $user->id) }}" />

                                        <x-btndelete actionBtn="{{ route('users.destroy', $user->id) }}"
                                            aletbtn="Tem certeza que deseja excluir este usuário? Os produtos criados por este usuário serão transferidos para o usuário master." />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection
