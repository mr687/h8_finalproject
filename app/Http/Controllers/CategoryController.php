<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mengambil id dari parent yang dipilih
        $parent_id = Category::where('name', $request['parentCategory'])->value('id');
        
        // Validasi data
        $request->validate([
            'newCategoryName' => 'required|string|unique:categories,name',
            'parentCategory' => 'required|'
        ]);
        
        // Membuat variable
        $validatedData = [
            'parent_id' => $parent_id,
            'name' => $request['newCategoryName']
        ];

        // Create data ke database
        Category::create($validatedData);
        
        return redirect()
            ->route('categories.index')
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Validasi data
        $request->validate([
            'newCategoryName' => ['required', 'string', 'unique:categories,name,'.$category->id]
        ]);

        // Mengambil id dari parent yang dipilih
        $parent_id = Category::where('name', $request['parentCategory'])->value('id');

        // Membuat variable
        $validatedData = [
            'parent_id' => $parent_id,
            'name' => $request['newCategoryName']
        ];

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Successfully updated data.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Delete data berdasarkan id
        Category::destroy($category->id);

        return redirect()
                ->route('categories.index')
                ->with('success', 'Data has been deleted');
    }
}
