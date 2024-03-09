<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public  $products =[
        ["id"=>1 ,"name"=>"car","price"=>1200,"created_at"=>"2024-03-02 12:00:00"],
        ["id"=>2 ,"name"=>"iphone","price"=>43432,"created_at"=>"2024-03-02 13:00:00"],
        ["id"=>3 ,"name"=>"samsung","price"=>654,"created_at"=>"2024-03-02 16:00:00"],
        ["id"=>4 ,"name"=>"smart w","price"=>876,"created_at"=>"2024-03-02 21:00:00"]
    ];
    public function index(){
       
        return view("products.index",["products"=>$this->products]);
    }
    public function show($productID){

        $res =array_filter($this->products ,fn($product)=>$product["id"]==$productID);
        $product =[...$res][0];
        return view("products.show",["product"=>$product]);
    }
    public function create(){

        return view("products.create");
    }
    public function store(){
        $reqObject =request();
        // dd($reqObject);
        $reqObject->validate(
            [
                "name"=>"required|string",
                "price"=>"required|numeric",
            ]
        );
        //secend step: store l data
        return to_route("products.index");
            
    }
    public function edit($productID){

        $res =array_filter($this->products ,fn($product)=>$product["id"]==$productID);
        $product =[...$res][0];
        return view("products.edit",["product"=>$product]);
    }
    public function update($productID){

        $reqObject =request();
        $reqObject->validate(
            [
                "name"=>"required|string",
                "price"=>"required|numeric",
            ]
        );
        $newProduct=[
            "id"=>$reqObject->id,
            "name"=>$reqObject->name,
            "price"=>$reqObject->price
        ];
        $index =array_search($productID ,array_column($this->products,'id'));
        $this->products[$index]=$newProduct;
        // dd($this->products);
        return to_route("products.index");

    }

    public function destroy($productID){
        $index =array_search($productID ,array_column($this->products,'id'));

        // dd($this->products[$index]);
    }

    //
}
