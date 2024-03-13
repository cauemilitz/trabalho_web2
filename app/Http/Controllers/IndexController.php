<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index(){
        $products=Product::all();
        
         return view("index", compact("products"));
    }
    public function search(Request $request){
        $products=Product::where("name","LIKE","%{$request->get('name')}")
            ->orWhere("amount","=",$request->get('amount'))
            ->get();

            return response()->view('index', compact('products'));
           // return view("index", compact("products"));
    }
    public function add(Request $request){
        $productId=$request->get('product_id');
        $product=Product::find($productId);
        $this->addItemToCart($product);        
        
        return Redirect::to('/carrinho');
    }

    private function addItemToCart(Product $product,int $quantity=1): void
    {
        $sessionCart=\Illuminate\Support\Facades\Session::get('cart');
        if(is_null($sessionCart)){
            $item= [
                'product'=>$product,
                'quantity'=>$quantity,
                'amount'=>$product->amount * $quantity
            ];
            $cart=[
                $product->id=> $item
            ];
            \Illuminate\Support\Facades\Session::push('cart',$cart);
            return;
        }
        $cart= $sessionCart[0];
        \Illuminate\Support\Facades\Session::remove('cart');
        if (! array_key_exists($product->id,$cart)){
            $item= [
                'product'=>$product,
                'quantity'=>$quantity,
                'amount'=> $product->amount * $quantity
            ];
            $cart[$product->id]= $item;
            asort($cart);
            \Illuminate\Support\Facades\Session::push('cart',$cart);
            return;
        }
        $productItem=$cart[$product->id];
        unset($cart[$product->id]);
        $productItem['quantity'] += $quantity;
        $productItem['amount'] = $productItem['amount'] * $productItem['quantity'];
        $cart[$product->id]= $productItem;
        asort($cart);
        \Illuminate\Support\Facades\Session::push('cart',$cart);
    }

}
