<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\Qrcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout(){
        return view("checkout");
    }

    public function store(Request $request){
        $customer=Customer::create([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "phone"=>$request->get("phone"),
            "adress"=>$request->get("adress"),
            "number"=>$request->get("number"),
            "postcode" =>$request->get("postcode"),
            "district"=>$request->get("district"),
            "city"=>$request->get("city"),
            "state"=>$request->get("state"),
        ]);
       
        $order=Order::create([
            'hash'=>sha1(microtime(true)),
            'status'=>'pending',
            "total"=>$request->get("total"),
            "freight"=>0,
            "discount"=>0,
            "customer_id"=>$customer->id,
        ]);

        $cart=Session::get("cart");
        $products=$cart[0];
        foreach($products as $product){
            Item::create([
                "order_id"=>$order->id,
                "product_id"=>$product['product']->id,
                'quantity'=>$product['quantity'],
            ]);
        }

        $qrCode = new QRCODE();
        $qrCode->TEXT("Knowband");
        $qrCode->QRCODE(400,storage_path('app/public') . "/Knowband_text.png");
        
        //redirecionar para a tela exibindo o código pix.
   }
}
