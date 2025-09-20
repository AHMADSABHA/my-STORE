<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        
        return view('dashboard-pages.products.list')->with('products', $products);
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('dashboard-pages.products.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'delivery_time' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        $data = $request->only(['name', 'description', 'price', 'delivery_time', 'category_id']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            $data['image'] = '/storage/' . $path;
        }
        Product::create($data);
        return redirect()->route('products.list');
    }

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('dashboard-pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'delivery_time' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        $product = Product::findOrFail($id);
        $data = $request->only(['name', 'description', 'price', 'delivery_time', 'category_id']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            $data['image'] = '/storage/' . $path;
        }
        $product->update($data);
        return redirect()->route('products.list');
    }

    public function delete(Request $request, $id)
    {
        $products = Product::find($id);

        if (!$products) {
            abort(404);
        }

        $products->delete();

        return redirect()->route('products.list');

        // Here we will write our database logic
    }
}
