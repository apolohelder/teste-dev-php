@extends('layouts.default')

@section('content')
    <div class="container">

        <div class="row pt-5">

            <div class="col-md-8 offset-md-2 mt-5 pt-5">

                <div class="row">

                    <div class="col-md mb-3">
                        <a class="btn btn-outline-secondary d-grid py-4 w-100" href="{{ route('suppliers.index') }}">
                            <i class="fa fa-cube fa-3x mb-2" aria-hidden="true"></i>
                            Fornecedores
                        </a>
                    </div>

                    <div class="col-md mb-3">
                        <a class="btn btn-outline-secondary d-grid py-4 w-100" href="{{ route('products.index') }}">
                            <i class="fa fa-cubes fa-3x mb-2" aria-hidden="true"></i>
                            Produtos
                        </a>
                    </div>

                    @if (Auth::user()->is_master)
                        <div class="col-md mb-3">
                            <a class="btn btn-outline-secondary d-grid py-4 w-100" href="{{ route('users.index') }}">
                                <i class="fa fa-users fa-3x mb-2" aria-hidden="true"></i>
                                Usuários
                            </a>
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>
@endsection
