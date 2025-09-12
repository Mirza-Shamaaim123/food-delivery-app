<?php

namespace App\Http\Controllers;
use App\Models\Product;
//use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // THIS METHOD WILL SHOW  PRODUCTS PAGE
    public function index(){
        $products = Product::orderBy('created_at','desc')->get();
        return view('products.list',compact('products'));

    }
      // THIS METHOD WILL SHOW CREATE PRODUCTS PAGE
    public function create(){
        return view('products.create');

    }
     // THIS METHOD WILL STORE A PRODUCT IN DB
    public function store(Request $request){
        $rules =[
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',

        ];
        if($request->image != ""){
             $rules ['image']='image';
        };
       $validator = validator::make($request->all(),$rules);
       if($validator->fails()){
           return redirect()->route('products.create')->withInput()->withErrors($validator);
       }
       // here we will store product in database
       $product = new Product();
       $product->name = $request->name;
       $product->sku = $request->sku;
       $product->price = $request->price;
       $product->description = $request->description;
       $product->save();
       if($request->image != ""){
         // here we will insert image
       $image =$request->image;
       $ext = $image->getClientOriginalExtension();
       $imageName = time().'.'.$ext; // Unique image Name
       // save image to products directory
       $image->move(public_path('upload/products'),$imageName);
       $product->image = $imageName;
       $product->save();
       }
       return redirect()->route('products.index')->with('success','Product added successfully');
    }
     // THIS METHOD WILL SHOW EDIT PRODUCTS PAGE
    public function edit($id){
       $product = Product::findOrFail($id);
        return view('products.edit',[
            'product' => $product
        ]);
    }
     // THIS METHOD WILL UPDATE A PRODUCT
    public function update($id,Request $request){
        $product = Product::findOrFail($id);
          $rules =[
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',

        ];
        if($request->image != ""){
             $rules ['image']='image';
        };
       $validator = validator::make($request->all(),$rules);
       if($validator->fails()){
           return redirect()->route('products.edit', $product->id)->withInput()->withErrors($validator);
       }
       // here we will update product in database
       
       $product->name = $request->name;
       $product->sku = $request->sku;
       $product->price = $request->price;
       $product->description = $request->description;
       $product->save();
       if($request->image != ""){
        File::delete(public_path('upload/products/'.$product->image));
         // here we will insert image
       $image =$request->image;
       $ext = $image->getClientOriginalExtension();
       $imageName = time().'.'.$ext; // Unique image Name
       // save image to products directory
       $image->move(public_path('upload/products'),$imageName);
       $product->image = $imageName;
       $product->save();
       }
       return redirect()->route('products.index')->with('success','Product updated successfully');
        


    }
     // THIS METHOD WILL DELETE A PRODUCT
    public function destory($id){
        $product = Product::findOrFail($id);
        // Delete image
        File::delete(public_path('upload/products/'.$product->image));
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');


    }

    //
}
