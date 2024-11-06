@extends('layouts.default')

@section('content')
    <div class="container pt-5">

        <div class="row pt-5">

            <div class="col-md-6 offset-md-3">

                <x-titlepage text="Editar Usuário" />

                <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <x-input typeinput="text" text="Nome do usuário" infor="name" placeholder="Nome do usuário"
                        value="{{ old('name', $user->name) }}" />

                    <x-input typeinput="email" text="E-mail" infor="email" placeholder="E-mail"
                        value="{{ old('email', $user->email) }}" />

                    <small>Deixe em branco para manter a senha atual.</small>
                    <x-input typeinput="password" text="Nova Senha" infor="password" placeholder="Nova Senha"
                        value="{{ old('password') }}" />

                    <x-input typeinput="password" text="Confirmar Nova Senha" infor="password_confirmation"
                        placeholder=">Confirmar Nova Senha" value="{{ old('password_confirmation') }}" />

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="is_master" name="is_master" value="1"
                            {{ $user->is_master ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexCheckDefault">
                            Usuário Master
                        </label>
                    </div>

                    <x-btnsubmit text="Atualizar usuário" />
                </form>

            </div>

        </div>

    </div>
@endsection
