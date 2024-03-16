<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("admin.products.index",compact("products"));
    }
    public function create(){
        $categories = Category::all();
        return view("admin.products.create",compact("categories"));
    }
    public function store(Request $request){

        $product = new Product();
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->amount = $request->input("amount");
        $product->quantity = $request->input("quantity");
        $product->image = 'vinho-roxo.jpeg';
        $product->sku = $request->input('sku');
        $product->is_active = $request->input('is_active');
        $product->category_id = $request->input('category_id');

        $product->save();
        return redirect()->route('product_list')->with("success","produto cadastrado com sucesso.");
    }
    public function edit($id){
        $product = Product::find($id);
        
        $categories = Category::all();
        return view("admin.products.edit",compact("product","categories"));
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $product = Product::where("id",$id)->update(array(
            "name"=> $request->input("name"),
            "description"=> $request->input("description"),
            "amount"=> $request->input("amount"),
            "quantity"=> $request->input("quantity"),
            "image"=> 'vinho-roxo.jpeg',
            "sku"=> $request->input("sku"),
            "is_active"=> $request->input("is_active"),
            "category_id"=> $request->input("category_id"),
        ));
        return redirect()->route('product_list')->with("success","produto atualizado com sucesso.");

    }
    public function destroy($id){
        $product = Product::where("id",$id)->delete();
        return redirect()->route('product_list')->with("success","produto deletado com sucesso.");
    }
}
