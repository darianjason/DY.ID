<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Detail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function all()
    {
        $categories = Category::all();
        $products = Product::paginate(6);
        $details = Detail::all();

        return view('index', compact('categories', 'products', 'details'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%')->paginate(6);

        return view('index', compact('products'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('product', compact('categories', 'product'));
    }

    public function viewProducts()
    {
        $categories = Category::all();
        $products = Product::all();
        $details = Detail::all();

        return view('products', compact('categories', 'products', 'details'));
    }

    public function updateProductPage($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $details = Detail::all();

        return view('edit-product', compact('categories', 'product', 'details'));
    }

    public function updateProduct(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:50',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpg'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'update');
        }

        $product = Product::find($id);
        $detail = Detail::find($id);

        $product->name = $request->name;
        $detail->description = $request->description;
        $detail->price = $request->price;
        $product->category_id = $request->category;

        $file = $request->file('image');
        if (isset($file)) {
            $fileName = time() . $file->getClientOriginalName();
            
            Storage::delete('public/' . $product->image);
            Storage::putFileAs('public/images', $file, $fileName);

            $detail->image = 'images/' . $fileName;
        }

        $product->save();
        $detail->save();

        return redirect('/products');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (isset($product)) {
            Storage::delete('public' . $product->image);
            $product->delete();
        }

        return redirect('/products');
    }
}
