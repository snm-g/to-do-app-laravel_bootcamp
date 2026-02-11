<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('tasks')->get();

        return view('category', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index');
    }
        public function destroy($id)
        {
            $category = Category::find($id);
            if ($category) {
                $category->delete();
            }
            return redirect()->route('category.index');
        }
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|max:255'
            ]);
            $category = Category::find($id);
            if($category) {
                $category->name = $request->name;
                $category->save();
            }
            return redirect()->route('category.index');
        }
}
