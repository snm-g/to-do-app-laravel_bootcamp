<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // GET /api/tasks
    public function index()
    {

        $tasks = Task::with(['category', 'tags'])->get();
        
        return response()->json($tasks, 200);
    }

    // POST /api/tasks
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',       
            'tags.*' => 'exists:tags,id'        
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'is_completed' => $request->is_completed ?? 0 
        ]);

        if ($request->has('tags')) {
            $task->tags()->attach($request->tags);
        }

   
        $task->load(['category', 'tags']);

        return response()->json([
            'message' => 'Tarea creada exitosamente',
            'data' => $task
        ], 201);
    }

    // GET /api/tasks/{id}
    public function show($id)
    {
        $task = Task::with(['category', 'tags'])->find($id);

        if (!$task) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        return response()->json($task, 200);
    }

    // PUT /api/tasks/{id}
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array'
        ]);

        // Actualizar datos básicos
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'is_completed' => $request->is_completed
        ]);

        if ($request->has('tags')) {
            $task->tags()->sync($request->tags);
        } else {
   
            $task->tags()->detach();
        }

        $task->load(['category', 'tags']);

        return response()->json([
            'message' => 'Tarea actualizada',
            'data' => $task
        ], 200);
    }

    // DELETE /api/tasks/{id}
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Tarea eliminada'], 200);
    }
}
