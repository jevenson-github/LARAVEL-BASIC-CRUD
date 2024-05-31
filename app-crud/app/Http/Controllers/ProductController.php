<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 


class ProductController extends Controller
{
    // to apply here  also the validation in controller 
    public function __construct()
    {
        $this->middleware('auth');
    } 


    public function index(){

        // fetch all products 
        $data = Product::all();
        return view('product.index', ['products' => $data]);

    }   

    public function create(){
        return view('product.create'); 
    }


    /*
            Store Product 
    */
    public function store(Request $request){

         //validation
         $data = $request->validate([
            'name' => 'required', 
            'qty'  =>'required|numeric', 
            'price' =>'required|decimal:2',
            'description'=> 'nullable' 
         ]); 

         // save product to database
         Product::create($data);


         // after the success insertion rediredt to index page with session message 
         return redirect(route('product.index'))->with('message','Product Added Successfuly'); 

        //access data 
        //dd($request); 
    }

    // Fetch the data needed to be update . 
    public function edit(Product $product){

        return view('product.edit', ['product' => $product]); 
            //
            // dd($product);
    }

    // update 
    public function update (Product $product , Request $request){
      //validation
        $data = $request->validate([
            'name' => 'required', 
            'qty'  =>'required|numeric', 
            'price' =>'required|decimal:2',
            'description'=> 'nullable' 
        ]); 

        $product->update($data); 

         // after the success insertion rediredt to index page with session message 
         return redirect(route('product.index'))->with('message','Product Updated Successfuly'); 
    }  
    
    //delete 
    public function delete (Product $product){
        $product->delete(); 
           // after the success insertion rediredt to index page with session message 
           return redirect(route('product.index'))->with('message','Product Deleted Successfuly'); 
    }
 }
