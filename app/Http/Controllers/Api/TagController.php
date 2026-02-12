<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return response()->json(Tag::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $tag = Tag::create($request->all());
        return response()->json($tag, 201);
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return $tag ? response()->json($tag) : response()->json(['error' => 'No encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        if (!$tag) return response()->json(['error' => 'No encontrado'], 404);
        
        $tag->update($request->all());
        return response()->json($tag, 200);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag) return response()->json(['error' => 'No encontrado'], 404);
        
        $tag->delete();
        return response()->json(['message' => 'Eliminado'], 200);
    }
}
