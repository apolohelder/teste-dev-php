@extends('layouts.default')

@section('content')
    <div class="container pt-5">
        <h1>{{ $product->name }}</h1>
        <p><strong>Descrição:</strong> {{ $product->description }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
        <p><strong>Fornecedor:</strong> {{ $product->supplier->name }}</p>
        <p><strong>Status:</strong> {{ $product->active ? 'Ativo' : 'Inativo' }}</p>
    </div>
@endsection
