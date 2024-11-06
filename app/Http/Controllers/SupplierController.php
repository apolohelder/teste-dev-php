<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Exibir uma lista de fornecedores na página.
     */
    public function index(){
        $suppliers = Supplier::all();
        return view('auth.fornecedores.index', compact('suppliers'));
    }

    /**
     * Página de formulário de fornecedor.
     */
    public function create() {
        return view('auth.fornecedores.create');
    }

    /**
     * Armazenar um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:suppliers',
            'cpf' => 'nullable|string|max:14',
            'nome_fantasia' => 'required|string|max:255',
            'descricao_situacao_cadastral' => 'required|string',
            'data_situacao_cadastral' => 'required|date',
            'codigo_natureza_juridica' => 'required|integer',
            'data_inicio_atividade' => 'required|date',
            'cnae_fiscal' => 'required|string',
            'cnae_fiscal_descricao' => 'required|string',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'complemento' => 'nullable|string',
            'bairro' => 'required|string',
            'cep' => 'required|string',
            'uf' => 'required|string|max:2',
            'ddd_telefone' => 'required|string',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    /**
     * Exibir o recurso especificado.
     */
    public function show($name){
        $supplier = Supplier::where('name', $name)->firstOrFail();
        
        // Carrega produtos do fornecedor
        $products = $supplier->products;

        // Retorna a view com a lista de produtos
        return view('auth.fornecedores.show', compact('supplier', 'products')); 
    }

    /**
     * Mostrar o formulário para edição do recurso especificado.
     */
    public function edit($id){
        $supplier = Supplier::findOrFail($id);
        return view('auth.fornecedores.edit', compact('supplier'));
    }

    /**
     * Atualizar o recurso especificado no armazenamento.
     */
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:suppliers,cnpj,' . $id,
            'cpf' => 'nullable|string|max:14',
            'nome_fantasia' => 'required|string|max:255',
            'descricao_situacao_cadastral' => 'required|string',
            'data_situacao_cadastral' => 'required|date',
            'codigo_natureza_juridica' => 'required|integer',
            'data_inicio_atividade' => 'required|date',
            'cnae_fiscal' => 'required|string',
            'cnae_fiscal_descricao' => 'required|string',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'complemento' => 'nullable|string',
            'bairro' => 'required|string',
            'cep' => 'required|string',
            'uf' => 'required|string|max:2',
            'ddd_telefone' => 'required|string',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        $supplier->save();
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor atualizado com sucesso.');
    }

    /**
     * Remover o recurso especificado do armazenamento.
     */
    public function destroy($id){
        $supplier = Supplier::findOrFail($id);

        // Verifica se o fornecedor tem produtos associados
        if ($supplier->products()->count() > 0) {
            return redirect()->route('suppliers.index')->with('error', 'O fornecedor não pode ser excluído porque possui produtos associados.');
        }

        // Se não houver produtos associados, exclua o fornecedor
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor excluído com sucesso.');
    }
}
