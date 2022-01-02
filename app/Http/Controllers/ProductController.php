<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Detail;

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
