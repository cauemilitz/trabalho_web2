<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function cart(){
        $products=[];
        $cart=Session::get("cart");
        if(!is_null($cart)){
            $products=$cart[0];
        }
        //dd($products);
        $total=array_reduce(
            $products,
            fn(int|null $total, $product) => $total + $product['amount'],
        );
        return view("cart",compact("products", "total"));
    }

    public function removeCart()
    {
        \Illuminate\Support\Facades\Session::remove('cart');
        return Redirect::to('/');
    }

    public function operation(Request $request){
        $productId = $request->get("product_id");
        $operation = $request->get('operation');

        $product=Product::find($productId);
        $this->get($product,$operation);
        return Redirect::to('/carrinho');
    }

    private function get(Product $product, string $operation){
        $quantity = 1;
        $sessionCart = \Illuminate\Support\Facades\Session::get('cart');
        $cart = $sessionCart[0];
        \Illuminate\Support\Facades\Session::remove('cart');

        $productItem = $cart[$product->id];
        unset($cart[$product->id]);

        if ($operation == 'add') {
            $productItem['quantity'] += $quantity;
            $productItem['amount'] += $product->amount;
        } else {
            $productItem['quantity'] -= $quantity;
            $productItem['amount'] -= $product->amount;
        }

        $cart[$product->id] = $productItem;
        asort($cart);
        \Illuminate\Support\Facades\Session::push('cart', $cart);
    }
    public function finishPay(Request $request){
        return Redirect::to('/checkout');
    }
}
