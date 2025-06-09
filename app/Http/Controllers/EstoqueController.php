<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Http\Controllers\Controller;

class EstoqueController extends Controller
{

    public function index()
    {
        return Estoque::all();
    }

    public function store(Request $request)
    {
        // Validação dessa bomba
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|integer',
            'category' => 'required|string|max:255',
        ]);

        $estoque = Estoque::create($request->all());

        return response()->json($estoque, 201);
    }

    public function show($id)
    {
        return Estoque::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Encontrando o estoque pelo ID ou falhando
        $estoque = Estoque::findOrFail($id);
        // Validação dessa bomba
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|integer',
            'category' => 'sometimes|required|string|max:255',
        ]);
        $estoque->update($request->all());
        return response()->json($estoque, 200);
    }

    public function destroy($id)
    {
        Estoque::destroy($id);
        return response()->json(null, 204);
    }
}
