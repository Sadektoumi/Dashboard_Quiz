<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;




class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.manage-categories', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
