<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Mengambil data untuk category
        $categories = Category::with('parent')
                    ->orderBy('parent_id', 'asc')
                    ->get();           
                    // ->paginate(10);
        // Mengambil data untuk input select kategori parent
        $parentsCategories = Category::where('parent_id', NULL)->get();

        return view('admin.category.index')
                ->with([
                    'parents' => $parentsCategories,
                    'categories' => $categories
                ]);
                    
    }

    public function store(Request $request)
    {       
        // Validasi data
        $request->validate([
            'newCategoryName' => 'required|string|unique:categories,name',
        ]);
        
        // Membuat variable
        $validatedData = [
            'parent_id' => $request->get('parentCategory', null),
            'name' => $request['newCategoryName']
        ];

        // Create data ke database
        Category::create($validatedData);
        
        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Successfully created new category.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        // Mengambil seluruh data parent
        $parentsCategories = Category::where('parent_id', NULL)->get();
        // Mengecek kondisi jika kategori parent sama dengan parent pada data 
        $parentName = $parentsCategories->firstWhere('id', '==', $category->parent_id);
        // Mengecek jika parentName null maka dikosongin dan input select akan didisabled
        $parentName = (is_null($parentName) ? '' : $parentName->name);

        return view('admin.category.edit')
                ->with([
                    'category' => $category,
                    'parentsCategories' => $parentsCategories,
                    'parentName' => $parentName  
                ]);
    }

    public function update(Request $request, Category $category)
    {
        // Validasi data
        $request->validate([
            'newCategoryName' => ['required', 'string', 'unique:categories,name,'.$category->id]
        ]);

        // Membuat variable
        $validatedData = [
            'parent_id' => $request->get('parentCategory'),
            'name' => $request['newCategoryName']
        ];

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Successfully updated data.');

    }

    public function destroy(Category $category)
    {
        // Delete data berdasarkan id
        Category::destroy($category->id);

        return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Data has been deleted');
    }
}
