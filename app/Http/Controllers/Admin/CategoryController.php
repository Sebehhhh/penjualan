<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'description' => 'required|string|max:1000',
        ]);

        Category::create([
            'name' => $request->name,
            // 'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

   
    public function edit($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $encryptedId)
    {
        // $id = Crypt::decrypt($encryptedId);
        $category = Category::findOrFail($encryptedId);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // 'description' => 'required|string|max:1000',
        ]);

        $category->update($validatedData);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($encryptedId)
    {
        // $id = Crypt::decrypt($encryptedId);
        $category = Category::findOrFail($encryptedId);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
