<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StockCategory;
use Illuminate\Http\JsonResponse;

class StockCategoryController extends Controller
{
    /**
     * Exibe todas as categorias de estoque.
     */
    public function index(): JsonResponse
    {
        $categories = StockCategory::all();

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }
}
