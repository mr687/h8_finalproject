<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query', '');
        $products = Product::with('category')
            ->where('name', 'like', "%{$query}%")
            ->orWhereHas('category', function($model) use($query){
                return $model->where('name', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc');
        return view('admin.product.index')
            ->withProducts($products->paginate(10));
    }

    public function create()
    {
        $categories = Category::whereHas('child')
            ->get();
        return view('admin.product.create')
            ->withCategories($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|in:Draft,Publish',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'image' => 'required|file|max:3072|mimes:jpg,png'
        ]);
        Product::create($request->except('image'));
        return redirect()
            ->route('products.index')
            ->with('success', 'Successfully new product created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::whereHas('child')
            ->get();
        return view('admin.product.edit')
            ->withProduct($product)
            ->withCategories($categories);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|in:Draft,Publish',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'image' => 'sometimes|required|file|max:3072|mimes:jpg,png'
        ]);

        $product->update($request->except('image'));
        return redirect()
            ->route('products.index')
            ->with('success', 'Successfully product update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->with('success', 'Successfully product deleted.');
    }
}
