<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view("admin.customers.index",compact("customers"));
    }
    public function create(){
        return view("admin.customers.create");
    }
    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->adress = $request->address;
        $customer->number = $request->number;
        $customer->postcode = $request->postcode;
        $customer->district = $request->district;
        $customer->city = $request->city;
        $customer->state = $request->state;

        $customer->save();
        return redirect()->route('customer_list')->with("success","cliente cadastrado com sucesso.");
    }
    public function edit($id){
        $customer = Customer::find($id);

        return view("admin.customers.edit",compact("customer"));
    }
    public function update(Request $request, $id)
    {
        $customer = Customer::where("id",$id)->update(array(
            "name"=> $request->input("name"),
            "email"=> $request->input("email"),
            "phone"=> $request->input("phone"),
            "adress"=> $request->input("adress"),
            "number"=> $request->input("number"),
            "postcode"=> $request->input("postcode"),
            "district"=> $request->input("district"),
            "city"=> $request->input("city"),
            "state"=> $request->input("state"),
        ));
        return redirect()->route('customer_list')->with("success","cliente atualizado com sucesso.");
    }
}

