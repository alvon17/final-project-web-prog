<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
            'description' => 'required',
            'price' => 'required|integer',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $file = $data->file('file');
        $file_name = $file->getClientOriginalName();
        $upload_path = 'image';
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

        File::delete('image/' . $products->photo);

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
            'description' => 'required',
            'price' => 'required|integer',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $products = Product::where('id', $request->id)->first();
        File::delete('image/' . $products->photo);

        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $upload_path = 'image';
        $file->move($upload_path, $file_name);

        DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $file_name
        ]);

        return redirect('/manage');
    }
}
