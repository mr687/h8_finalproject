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
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function edit(Product $product)
    {
        $categories = Category::whereHas('child')
            ->get();
        return view('admin.product.edit')
            ->withProduct($product)
            ->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
