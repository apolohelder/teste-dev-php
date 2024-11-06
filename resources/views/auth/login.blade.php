@extends('layouts.default')

@section('content')
    <main class="container-fluid bg-white">

        <div class="container vh-100">

            <div class="row align-items-center h-75">

                <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4">

                    <form method="POST" action="{{ route('login') }}" autocomplete="off">

                        @csrf

                        <!-- <div class="text-center mb-4">
                                <img class="img-fluid" width="150" height="150" src="{{ asset('images/logo.jpg') }}"
                                    alt="Logo">
                            </div> -->

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ old('username') }}" placeholder="name@example.com">
                            <label for="username">Nome ou E-mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Informe sua senha">
                            <label for="password">Senha</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Manter-me conectado
                            </label>
                        </div>

                        <button type="submit" class="btn btn-dark btn-lg w-100 mt-5">Acessar minha conta</button>

                    </form>

                </div>

            </div>
        </div>
    </main>
@endsection
