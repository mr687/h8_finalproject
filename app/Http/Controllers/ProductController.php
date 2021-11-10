<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            ->withProducts($products->paginate(5));
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
        $uploadedImage =  $this->uploadImage($request);
        Product::create($request->merge($uploadedImage)->except('image'));
        return redirect()
            ->route('admin.products.index')
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

        if ($request->hasFile('image'))
        {
            $uploadedImage = $this->uploadImage($request);
            $request = $request->merge($uploadedImage);
        }

        $product->update($request->except('image'));
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Successfully product update.');
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Successfully product deleted.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.products.index')
                ->with('error', 'This product cannot be deleted. May be related to other models.');
        }
    }

    private function uploadImage(Request $request)
    {
        $encoded = base64_encode(file_get_contents($request->file('image')));
        $response = Http::asMultipart()->post('https://api.imgbb.com/1/upload?expiration=40320&key=3d2d515a5f7e8bde539d5cf845b7147a', [
            'image' => $encoded
        ]);
        if ($response->ok()){
            $data = $response->object();
            $imageUrl = $data->data->url;
            $deleteUrl = $data->data->delete_url;
            return [
                'image_url' => $imageUrl,
                'delete_image_url' => $deleteUrl,
            ];
        }
        return [];
    }
}
