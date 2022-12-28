<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function manage()
    {
        $categories = Category::all();
        $products = Product::paginate(10);
        return view('admin.manage', ['products' => $products, 'categories' => $categories]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.add', ['categories' => $categories]);
    }

    public function customAddProduct(Request $data)
    {
        $this->validate($data, [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $file = $data->file('file');
        $path_info = pathinfo($file->getClientOriginalName());
        $file_name = $path_info['filename'] . '-' . time() . '.' . $file->getClientOriginalExtension();
        $upload_path = 'storage/';
        $file->move($upload_path, $file_name);

        Product::create([
            'name' => $data['name'],
            'category_id' => $data['category'],
            'description' => $data['description'],
            'price' => $data['price'],
            'photo' => $file_name,
        ]);

        session()->flash('message', 'Add Product Successful');

        return redirect('manage');
    }

    public function deleteProduct($id)
    {
        $products = Product::where('id', $id)->first();

        File::delete('storage/' . $products->photo);

        Product::where('id', $id)->first()->delete();

        return redirect()->back();
    }

    public function update($id)
    {
        $products = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.update', ['categories' => $categories, 'id' => $id, 'products' => $products]);
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $products = Product::where('id', $request->id)->first();
        File::delete('storage/' . $products->photo);

        $file = $request->file('file');
        $path_info = pathinfo($file->getClientOriginalName());
        $file_name = $path_info['filename'] . '-' . time() . '.' . $file->getClientOriginalExtension();
        $upload_path = 'storage/';
        $file->move($upload_path, $file_name);

        Product::where('id', $request->id)->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $file_name,
        ]);

        session()->flash('message', 'Update Product Successful');

        return redirect('/manage');
    }

    public function manageSearch(Request $request)
    {
        $categories = Category::all();
        $name = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $name . '%')->paginate(10);

        $products->appends(['search' => $name]);

        return view('admin.manage', ['categories' => $categories, 'products' => $products]);
    }
}