<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierApiController extends Controller
{
    /**
     * Listar todos os fornecedores.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers, 200);
    }

    /**
     * Criar um novo fornecedor.
     */
    public function store(Request $request)
    {
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

        $supplier = Supplier::create($request->all());

        return response()->json([
            'message' => 'Fornecedor criado com sucesso!',
            'supplier' => $supplier
        ], 201);
    }

    /**
     * Exibir um fornecedor específica.
     */
    public function show($identifier)
    {
        // Verifica se o identificador é um CPF ou CNPJ válido
        if (strlen($identifier) === 14 || strlen($identifier) === 11) {
            $supplier = Supplier::where('cnpj', $identifier)->orWhere('cpf', $identifier)->first();
        } else {
            $supplier = Supplier::find($identifier);
        }

        if (!$supplier) {
            return response()->json([
                'message' => 'Fornecedor não encontrado.'
            ], 404);
        }

        return response()->json($supplier, 200);
    }

    /**
     * Atualizar um fornecedor existente.
     */
    public function update(Request $request, $id)
    {
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

        return response()->json([
            'message' => 'Fornecedor atualizado com sucesso!',
            'supplier' => $supplier
        ], 200);
    }

    /**
     * Excluir um fornecedor.
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        // Verifica se o fornecedor possui produtos associados
        if ($supplier->products()->count() > 0) {
            return response()->json([
                'message' => 'O fornecedor não pode ser excluído porque possui produtos associados.'
            ], 400);
        }

        $supplier->delete();

        return response()->json([
            'message' => 'Fornecedor excluído com sucesso!'
        ], 200);
    }
}
