<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Listar todos os produtos.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user && $user->is_master) {
            // Se o usuário for master, ele verá todos os produtos
            $products = Product::with('supplier')->get();
        } elseif ($user) {
            // Se o usuário estiver autenticado, verá apenas os produtos que ele criou
            $products = Product::with('supplier')->where('user_id', $user->id)->get();
        } else {
            // Usuários não autenticados verão todos os produtos ativos
            $products = Product::with('supplier')->where('is_active', true)->get();
        }

        return response()->json($products, 200);
    }

    /**
     * Criar um novo produto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'is_active' => 'required|boolean',
        ]);

        // Adicionar o ID do usuário ao produto
        $data = $request->all();
        $data['user_id'] = auth()->id();

        $product = Product::create($data);

        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'product' => $product
        ], 201);
    }

    /**
     * Exibir um produto específico.
     */
    public function show($id)
    {
        $product = Product::with('supplier')->findOrFail($id);
        return response()->json($product, 200);
    }

    /**
     * Atualizar um produto existente.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'is_active' => 'required|boolean',
        ]);

        $product = Product::findOrFail($id);

        // Verifica se o usuário tem permissão para atualizar o produto
        if ($request->user()->cannot('update', $product)) {
            return response()->json(['message' => 'Ação não autorizada.'], 403);
        }

        $product->update($request->all());

        return response()->json([
            'message' => 'Produto atualizado com sucesso!',
            'product' => $product
        ], 200);
    }

    /**
     * Excluir um produto.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Verifica se o usuário tem permissão para excluir o produto
        if (auth()->user()->cannot('delete', $product)) {
            return response()->json(['message' => 'Ação não autorizada.'], 403);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produto excluído com sucesso!'
        ], 200);
    }
}
