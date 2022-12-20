<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function cart()
    {
        $categories = Category::all();
        $cart = session()->get('cart', []);
        return view('cart', ['categories' => $categories, 'cart' => $cart]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);

        $cart = session()->get('cart', []);

        foreach ($cart as $c) {
            if ($product->id == $c['id']) {
                session()->flash('message', 'Item Already Added in Cart');
                return redirect('cart');
            }
        }

        $cart[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'photo' => $product->photo,
        ];
        session()->put('cart', $cart);

        session()->flash('message', 'Item Added to Cart');

        return redirect('cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $i => $c) {
            if ($c['id'] == $id) {
                unset($cart[$i]);
                break;
            }
        }

        session()->put('cart', $cart);

        return redirect('cart');
    }
}