<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag', compact('tags'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        return redirect()->route('tag.index');
    }
    public function destroy($id)
        {
            $tag = Tag::find($id);
            if ($tag) {
                $tag->delete();
            }
            return redirect()->route('tag.index');
        }

    public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|max:255'
            ]);
            $tag = Tag::find($id);
            if($tag) {
                $tag->name = $request->name;
                $tag->save();
            }
            return redirect()->route('tag.index');
        }
}
