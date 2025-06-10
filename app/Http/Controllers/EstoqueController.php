<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Http\Controllers\Controller;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|integer',
            'category' => 'required|integer', // chave etrangeira do stock_category
        ]);

        $estoque = Estoque::create($request->all());

        return response()->json($estoque->load('stockCategory'), 201);
    }

    public function update(Request $request, $id)
    {
        $estoque = Estoque::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|integer',
            'category' => 'sometimes|required|integer',
        ]);

        $estoque->update($request->all());

        return response()->json($estoque->load('stockCategory'), 200);
    }

    public function destroy($id)
    {
        Estoque::destroy($id);
        return response()->json(null, 204);
    }
}
