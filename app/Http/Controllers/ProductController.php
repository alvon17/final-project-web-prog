<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('index', ['products' => $products, 'categories' => $categories]);
    }

    public function category($name)
    {
        $categories = Category::all();
        $category = Category::where('name', $name)->first();

        return view('category', ['category' => $category, 'categories' => $categories]);
    }

    public function detail($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('detail', ['products' => $products, 'categories' => $categories]);
    }
}