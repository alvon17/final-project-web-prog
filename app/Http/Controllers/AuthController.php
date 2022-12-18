<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    public function login()
    {
        $categories = Category::all();
        return view('auth.login', ['categories' => $categories]);
    }

    public function registration()
    {
        $countries = Country::all();
        $categories = Category::all();
        return view('auth.registration', ['countries' => $countries, 'categories' => $categories]);
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Session::put('username', $credentials['email']);
            Session::put('password', $credentials['password']);

            if ($request->has('remember')) {
                Cookie::queue(Cookie::make('username', $credentials['email'], 120));
                Cookie::queue(Cookie::make('password', $credentials['password'], 120));
            }

            return redirect()->intended('/dashboard')
                ->withSuccess('Signed in');
        }

        $errors = new MessageBag(['password' => ['Wrong Password']]);

        return Redirect::back()->withErrors($errors);
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns|unique:users',
            'passwords' => 'required|min:8',
            'confirm_password' => 'required|same:passwords',
            'gender' => 'required',
            'date_of_birth' => 'required|date|after:01/01/1900|before:today',
            'country_id' => 'required',
        ]);

        $data = $request->all();
        // $check = $this->create($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['passwords']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'country_id' => $data['country_id'],
        ]);

        Session::flash('message', 'Registration Successful');

        return redirect('login');
    }

    public function dashboard()
    {
        // if (Auth::check()) {
        //     return view('index');
        // }

        // return redirect('login')->withSuccess('You are not allowed to access');
        $categories = Category::all();
        $products = Product::all();
        return view('index', ['products' => $products, 'categories' => $categories]);
    }

    public function profile()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('profile', ['products' => $products, 'categories' => $categories]);
    }

    public function manage()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('manage', ['products' => $products, 'categories' => $categories]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('add', ['categories' => $categories]);
    }

    public function customAddProduct(Request $data)
    {
        $this -> validate($data, [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $file = $data -> file ('file');
        $file_name = $file -> getClientOriginalName();
        $upload_path = 'image';
        $file -> move ($upload_path, $file_name);

        Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'photo' => $file_name,
        ]);

        ProductCategory::create([
            'product_id' => DB::table('products')->latest('created_at')->first()->id,
            'category_id' => $data['category']
        ]);

        Session::flash('message', 'Add Product Successful');

        return redirect('manage');
    }

    public function deleteProduct ($id) {
        $product = Product::where ('id', $id)->first ();

        File::delete ('image/' . $product->photo);

        ProductCategory::where ('product_id', $id) -> first() -> delete();
        Product::where ('id', $id) -> first () -> delete();

        return redirect() -> back();
    }

    public function update()
    {
        return view('update');
    }

    public function cart()
    {
        return view('cart');
    }

    public function transaction()
    {
        return view('transaction');
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('username'));
        Cookie::queue(Cookie::forget('password'));

        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $name = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $name . '%')->get();
        // dd($products);

        return view('search', ['categories' => $categories, 'products' => $products]);
    }
}