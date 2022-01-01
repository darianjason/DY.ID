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
        $products = Product::all();
        $details = Detail::all();

        return view('index', compact('categories', 'products', 'details'));
    }

    public function details($id) {
        $categories = Category::all();
        $productFind = Product::find($id);

        return view('details', compact('categories', 'productFind'));
    }
}
