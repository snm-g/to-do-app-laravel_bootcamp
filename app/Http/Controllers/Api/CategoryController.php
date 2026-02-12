<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        // Mantenemos el withCount para que la API devuelva el número de tareas
        $categories = Category::withCount('tasks')->get();
        
        return response()->json($categories, 200);
    }

    // POST /api/categories
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Categoría creada exitosamente',
            'data' => $category
        ], 201);
    }

    // GET /api/categories/{id}
    public function show($id)
    {
        $category = Category::withCount('tasks')->find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json($category, 200);
    }

    // PUT /api/categories/{id}
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category->name = $request->name;
        $category->save();

        return response()->json([
            'message' => 'Categoría actualizada',
            'data' => $category
        ], 200);
    }

    // DELETE /api/categories/{id}
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Categoría eliminada'], 200);
    }
}
