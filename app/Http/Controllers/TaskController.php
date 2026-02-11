<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;
class TaskController extends Controller
{
    public function index()
        {
            $tasks = Task::with(['category', 'tags'])->get();
            $categories = Category::all();
            $tags = Tag::all();
            return view('task', compact('tasks', 'categories', 'tags'));
        }
    public function store(Request $request)
        {
            // 1. Validar datos básicos
            $request->validate([
                'title' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'tags' => 'nullable|array' 
            ]);

            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'is_completed' => $request->is_completed
            ]);
            if ($request->has('tags')) {
                $task->tags()->attach($request->tags);
            }

            return redirect()->route('task.index');
        }
        public function destroy($id)
        {
            $task = Task::find($id);
            if ($task) {
                $task->delete();
            }
            return redirect()->route('task.index');
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'title' => 'required|max:255',
                'category_id' => 'required',
                'tags' => 'nullable|array'
            ]);
            $task = Task::findOrFail($id);
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

            return redirect()->route('task.index');
        }
    
}
