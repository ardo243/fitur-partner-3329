<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use illuminate\Support\str;

class CategoryController extends Controller
{
public function index(Request $request)
{
    $search = $request->search;
    $categories = Category::where('name', 'LIKE', "%$search%")
                    ->paginate(5)
                    ->withQueryString();
    return view('admin.categories.index', compact('categories'));
}
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
       Category::create([
    'name' => $request->name,
    'slug' => Str::slug($request->name)
]);

        return redirect()->route('admin.categories.index')->with('success', 'Data Kategori berhasil ditambahkan.');
        
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

$category->update([
    'name' => $request->name,
    'slug' => Str::slug($request->name)

        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Data Kategori berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Data Kategori berhasil dihapus.');

    }
}