<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::paginate(5);
        return view('dashboard-pages.categories.list', compact('categories'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('dashboard-pages.categories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
           
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        $data = $request->only(['name', 'description', 'price', 'delivery_time', 'category_id']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            $data['image'] = '/storage/' . $path;
        }
        Category::create($data);
        return redirect()->route('categories.list');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard-pages.categories.edit', compact('category'));
      //  return view('dashboard-pages.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        $category = Category::findOrFail($id);
        $data = $request->only(['name', 'description']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            $data['image'] = '/storage/' . $path;
        }
        $category->update($data);
        return redirect()->route('categories.list');
    }

    public function delete(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }

        $category->delete();

        return redirect()->route('categories.list');

        // Here we will write our database logic
    }
}
