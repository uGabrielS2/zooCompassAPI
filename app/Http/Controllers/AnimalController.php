<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Http\Controllers\Controller;

class AnimalController extends Controller
{
    public function index()
    {
        return Animal::all();
    }

    public function store(Request $request)
    {
        $animal = Animal::create($request->all());
        return response()->json($animal, 201);
    }

    public function show($id)
    {
        return Animal::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update($request->all());
        return response()->json($animal, 200);
    }

    public function destroy($id)
    {
        Animal::destroy($id);
        return response()->json(null, 204);
    }
}