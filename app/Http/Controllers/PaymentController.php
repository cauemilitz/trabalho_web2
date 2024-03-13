<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function payment(){
        $qrCode = Session::get('qrCode')[0];
        $orderId=Session::get('orderId')[0];
        
        return view("payment", compact("qrCode","orderId"));

    }
    public function simulate(Request $request){
        $orderId=$request->get("order_id");
        
        Order::where("id",$orderId)->update([
            "status"=>"aproved",
            "paid_at"=>new \DateTimeImmutable(""),
        ]);
        \Illuminate\Support\Facades\Session::remove('cart');
        \Illuminate\Support\Facades\Session::remove('qrCode');
        \Illuminate\Support\Facades\Session::remove('orderId');
        return view('success');
    }
}
