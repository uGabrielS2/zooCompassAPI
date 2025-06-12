<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\StockCategory;

class EstoqueController extends Controller
{
    public function index()
    {
        return Estoque::with('stockCategory')->get();
    }

    public function show($id)
    {
        return Estoque::with('stockCategory')->findOrFail($id);
    }

    public function store(Request $request)
    {
        \Log::info('Payload recebido em store:', $request->all());

        $request->validate([
            'name'     => 'required|string|max:255',
            'amount'   => 'required|integer',
            'category' => 'required|string', // Recebendo como nome
        ]);

        // Buscar o ID da categoria pelo nome
        $cat = StockCategory::where('name', $request->category)->firstOrFail();

        $data = [
            'name'     => $request->name,
            'amount'   => $request->amount,
            'category' => $cat->id, // Agora com ID
        ];

        \Log::info('Dados mapeados para salvar:', $data);

        $estoque = Estoque::create($data);

        return response()->json($estoque->load('stockCategory'), 201);
    }

    public function update(Request $request, $id)
    {
        $estoque = Estoque::findOrFail($id);

        $request->validate([
            'name'     => 'sometimes|required|string|max:255',
            'amount'   => 'sometimes|required|integer',
            'category' => 'sometimes|required|string',
        ]);

        if ($request->filled('category')) {
            $cat = StockCategory::where('name', $request->category)->firstOrFail();
            $request->merge(['category' => $cat->id]);
        }

        $estoque->update($request->only('name', 'amount', 'category'));

        return response()->json($estoque->load('stockCategory'), 200);
    }

    public function destroy($id)
    {
        Estoque::destroy($id);
        return response()->json(null, 204);
    }
}
