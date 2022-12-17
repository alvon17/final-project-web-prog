<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product () {
        $products = Product::all();
        $categories = Category::all();
        return view('index', ['products'=>$products, 'categories'=>$categories]);
    }

    public function category ($id) {
        $categories = Category::all();
        $category = Category::find($id);

        return view('category', ['category'=>$category, 'categories'=>$categories]);
    }

}
