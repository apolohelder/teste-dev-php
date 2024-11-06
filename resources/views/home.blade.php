@extends('layouts.default')

@section('content')
    <main class="container-fluid h-100 pt-5">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($products as $product)
                    @if ($product->is_active)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5><strong>Fornecedor:</strong>
                                        <a href="{{ route('suppliers.show', $product->supplier->name) }}">
                                            {{ $product->supplier->name }}
                                        </a>
                                    </h5>
                                    <p class="card-title"><strong>Produtos:</strong> {{ $product->name }}</p>
                                    <p class="card-text">
                                        {{ $product->description }}
                                    </p>
                                    <p>R$ {{ number_format($product->price, 2, ',', '.') }}</p>

                                    <!-- Inclui o nome do fornecedor -->
                                    <a href="{{ route('auth.produtos.show', $product->name) }}">Veja mais</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>
@endsection
