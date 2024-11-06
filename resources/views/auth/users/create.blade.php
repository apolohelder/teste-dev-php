@extends('layouts.default')

@section('content')
    <div class="container pt-5">

        <div class="row pt-5">

            <div class="col-md-6 offset-md-3">

                <x-titlepage text="Criar Novo Usuário" />

                <form action="{{ route('users.store') }}" method="POST" autocomplete="off">

                    @csrf

                    <x-input typeinput="text" text="Nome do usuário" infor="name" placeholder="Nome do usuário"
                        value="{{ old('name') }}" />

                    <x-input typeinput="email" text="E-mail" infor="email" placeholder="E-mail"
                        value="{{ old('email') }}" />

                    <x-input typeinput="password" text="Senha" infor="password" placeholder="Senha"
                        value="{{ old('password') }}" />

                    <x-input typeinput="password" text="Confirmar Senha" infor="password_confirmation"
                        placeholder=">Confirmar Senha" value="{{ old('password_confirmation') }}" />

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="is_master" name="is_master" value="1">
                        <label class="form-check-label" for="is_master">
                            Usuário Master
                        </label>
                    </div>

                    <x-btnsubmit text="Criar Usuário" />
                </form>

            </div>

        </div>

    </div>
@endsection
