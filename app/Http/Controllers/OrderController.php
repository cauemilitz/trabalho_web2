<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Coupon;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('customer')->get(); 
        return view("admin.orders.index",compact("orders"));
    }
    public function create(){
       $customers = Customer::all();
       $coupons = Coupon::all();
        return view("admin.orders.create", compact("customers","coupons"));
    }
    public function store(Request $request){
        //dd($request->all());
        $discount = 0;
        $couponId = null;
        $total = $request->total;
        if(! empty($request->get("coupon_id"))){
            $couponId = $request->get("coupon_id");
            $coupon = Coupon::find($couponId);
            $discount = $coupon->amount;
            $total = $total - $discount;
        }
        
        $order = new Order();
        $order->hash = sha1(microtime(true));
        $order->status = 'pending';
        $order->total = $total;
        $order->freight = 0;
        $order->discount = $discount;
        $order->coupon_id = $couponId;
        $order->customer_id = $request->customer_id;

        $order->save();
        return redirect()->route('order_list')->with("success","pedido cadastrado com sucesso.");
    }
    public function edit($id){
        $order = Order::find($id);
        $customers = Customer::all();
        $coupons = Coupon::all();
        $status = [
            "pending" => "pending",
            "approved" => "approved",
            "refunded" => "refunded",
            "canceled" => "canceled"
        ];
        return view("admin.orders.edit",compact("order","customers","coupons", "status"));
    }
    public function update(Request $request, $id)
    {
        $paidAt = null;
        $refundAt = null;
        $status = $request->get('status');
        if ($status == 'approved') {
            $paidAt = new \DateTimeImmutable();
        }
        if ($status == 'refunded') {
            $refundAt = new \DateTimeImmutable();
        }

        $discount = 0;
        $couponId = null;
        $total = $request->total;

        if(! empty($request->get("coupon_id"))){
            $couponId = $request->get("coupon_id");
            $coupon = Coupon::find($couponId);
            $discount = $coupon->amount;
            $total = $total - $discount;
        }

        $data = array(
            "status"=> $status,
            "total"=> $request->input("total"),
            "freight"=> 0,
            "discount"=> $total,
            "customer_id"=> $request->input("customer_id"),
            "coupon_id"=> $couponId,
            "paid_at" => $paidAt,
            "refund_at" => $refundAt
        );
        
        $order = Order::where("id",$id)->update($data);
        return redirect()->route('order_list')->with("success","pedido atualizado com sucesso.");
    }
}
