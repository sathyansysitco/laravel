<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => isset($cart[$product->id]) ? $cart[$product->id]['quantity'] + 1 : 1,
        ];
        session()->put('cart', $cart);

        return response()->json(['status' => 'added']);
    }


    public function increment(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return response()->json(['status' => 'incremented']);
    }

    public function decrement(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return response()->json(['status' => 'decremented']);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;

        unset($cart[$id]);
        session()->put('cart', $cart);

        return response()->json(['status' => 'removed']);
    }
}
