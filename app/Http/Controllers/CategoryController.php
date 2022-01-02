<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function viewCategories()
    {
        $categories = Category::all();

        return view('categories', compact('categories'));
    }

    public function insertCategoryPage()
    {
        return view('add-category');
    }

    public function insertCategory(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories|min:2'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'insert');
        }

        $category = new Category();

        $category->name = $request->name;

        $category->save();

        return redirect('/categories');
    }

    public function updateCategoryPage($id)
    {
        $category = Category::find($id);

        return view('edit-category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:categories|min:2'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'update');
        }

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect('/categories');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/categories');
    }
}
