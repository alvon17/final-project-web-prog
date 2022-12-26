<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class WebController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('all.dashboard', ['products' => $products, 'categories' => $categories]);
    }

    public function profile()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('user.profile', ['products' => $products, 'categories' => $categories]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $name = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $name . '%')->get();

        return view('all.search', ['categories' => $categories, 'products' => $products]);
    }
    
    public function product()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('all.dashboard', ['products' => $products, 'categories' => $categories]);
    }

    public function category($name)
    {
        $categories = Category::all();
        $category = Category::where('name', $name)->first();
        $products = Product::where('category_id', $category->id)->paginate(10);

        return view('all.category', ['category' => $category, 'categories' => $categories, 'products' => $products]);
    }

    public function detail($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('all.detail', ['products' => $products, 'categories' => $categories]);
    }
}
