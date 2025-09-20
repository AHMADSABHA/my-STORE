<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
    $categories = Category::all();
    $collections = Product::with('category')->paginate(5);
    return view('welcome', compact('collections', 'categories'));
    }
public function index2()
    {
   // $categories = Category::all();
    $collections = Product::with('category')->paginate(5);
    return view('productes.product', compact('collections'));
    }
    public function productDetails($id)
    {
   // $categories = Category::all();
    //$collections = Product::with('category')->paginate(5);
    $product = Product::with('category')->findOrFail($id);
    return view('productes.product-details', compact('product'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'delivery_time' => 'nullable|string',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
             'delivery_time' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
