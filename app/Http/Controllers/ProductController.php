<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;    
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;
    /**
     * Exibir uma lista do recurso.
     */
    public function index(){

        $user = auth()->user();
        
        if ($user->is_master) {
            // Se o usuário for master, ele verá todos os produtos
            $products = Product::with('supplier')->get();
        } else {
            // Caso contrário, ele verá apenas os produtos que ele criou
            $products = Product::with('supplier')->where('user_id', $user->id)->get();
        }

        return view('auth.produtos.index', compact('products'));
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     */
    public function create(){
        $suppliers = Supplier::all();

        // Verifique se há fornecedor cadastrado
        $suppliersCount = Supplier::count();
        
        if ($suppliersCount === 0) {
            return redirect()->route('products.index')->with('error', 'Você precisa cadastrar um fornecedor antes de adicionar um produto.');
        }

        return view('auth.produtos.create', compact('suppliers'));
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'is_active' => 'required',
        ], [
            'name.required' => 'Por favor, preencha o campo de nome.',
            'price.required' => 'Por favor, preencha o campo de preço.',
            'price.numeric' => 'O preço deve ser um valor numérico.',
            'supplier_id.required' => 'Por favor, selecione um fornecedor.',
            'supplier_id.exists' => 'A fornecedor selecionada não é válida.',
            'is_active.required' => 'Por favor, indique se o produto está ativo.',
        ]);

        // Adicionar o ID do usuário ao produto
        $data = $request->all();
        $data['user_id'] = auth()->id();

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso.');
    }

    /**
     * Exibir o recurso especificado.
     */
    public function show($name){
        $product = Product::where('name', $name)->firstOrFail();
        return view('auth.produtos.show', compact('product'));
    }

    /**
     * Mostrar o formulário para edição do recurso especificado.
     */
    public function edit($id){
        $product = Product::findOrFail($id);

        $suppliers = Supplier::all();

        return view('auth.produtos.edit', compact('product', 'suppliers'));
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'is_active' => 'required|boolean',
        ]);
        
        $product = Product::findOrFail($id);

        $product->update($request->all());
        
        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso.');
    }


    /**
     * Remover o recurso especificado do armazenamento.
     */
    public function destroy($id){
        $product = Product::findOrFail($id);

        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso.');
    }
}
