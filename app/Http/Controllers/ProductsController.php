<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
class ProductsController extends Controller
{
    // public $products = Product::all();
    // [
    //     ["id"=>1 ,"name"=>"car","price"=>1200,"created_at"=>"2024-03-02 12:00:00"],
    //     ["id"=>2 ,"name"=>"iphone","price"=>43432,"created_at"=>"2024-03-02 13:00:00"],
    //     ["id"=>3 ,"name"=>"samsung","price"=>654,"created_at"=>"2024-03-02 16:00:00"],
    //     ["id"=>4 ,"name"=>"smart w","price"=>876,"created_at"=>"2024-03-02 21:00:00"]
    // ];
    public function index(Request $request){
        // dd($request->query("q"));
        $products = Product::latest()->filter($request->query)->paginate(4);
        return view("products.index",["products"=>$products]);
    }
    public function show($productID){

        // $res =array_filter($this->products ,fn($product)=>$product["id"]==$productID);
        // $product =[...$res][0];

        $product = Product::find($productID);
        return view("products.show",["product"=>$product]);
    }
    
    public function create(){

        return view("products.create");
    }
    public function store(StoreProductRequest $request){
        // $reqObject =request();
        // dd($reqObject);
        // $reqObject->validate(
        //     [
        //         "name"=>"required|string",
        //         "price"=>"required|numeric",
        //     ]
        // );
    //     //secend step: store l data
        // dd($request->file('photo')->store('public'));

        $productName=$request->name;
        $productPrice=$request->price;
        $productPhoto=$request->file('photo')->store('','public');
        // dd($productPhoto);

        // $newProduct = new Product;
        // $newProduct->name = $productName;
        // $newProduct->price = $productPrice;
        // $newProduct->save();
        Product::create(
            [
                'name'=>$productName,
                'price'=>$productPrice,
                'photo'=>$productPhoto
            ]
        );



        return to_route("products.index")->with("requestStatus","product created successfuly");
            
    }
    public function edit(Product $product){

        // $res =array_filter($this->products ,fn($product)=>$product["id"]==$productID);
        // $product =[...$res][0];
        //////////////////////
        // $product = Product::find($productID);
        /////////////////
        return view("products.edit",["product"=>$product]);
    }
    public function update(Request $request,$productID){

        // $reqObject =request();
        // $reqObject->validate(
        //     [
        //         "name"=>"required|string",
        //         "price"=>"required|numeric",
        //     ]
        // );
        // $newProduct=[
        //     "id"=>$reqObject->id,
        //     "name"=>$reqObject->name,
        //     "price"=>$reqObject->price
        // ];
        // $index =array_search($productID ,array_column($this->products,'id'));
        // $this->products[$index]=$newProduct;
        // // dd($this->products);
        $product = Product::find($productID);
        $product->name =$request->name;
        $product->price =$request->price;
        $product->photo =$request->file('photo')->store('','public');

        $product->save();
        return to_route("products.index");

    }

    public function destroy($productID){
        // $index =array_search($productID ,array_column($this->products,'id'));

        // dd($this->products[$index]);
        $product = Product::find($productID);
        // dd($product);
        $product->delete();
        return to_route("products.index");
    }

    //
}
