<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductApiController extends Controller
{
    //

    function list(){
        // return 'this is the list';
         return Product::all();
    }

      function getProduct(Request $request){
        // return 'this is the list';
         $name = $request->name;
// dd($name );
// where(column, operator, value)
// Product::where('name', 'LIKE', '%' . $name . '%')
// Product::where(column: 'name', operator: $name, value: $name)



         return Product::where(column: 'name', operator: '=', value: $name)
         ->orderBy(column: 'id', direction: 'desc')
         ->take(value: 3)->get();


         // all vs get
         // if we want to get all data then we will use alll
         // if we want to add where condition we will use get 

    }


       function addProduct(Request $request){
        //  return $request->input();

          $product = new Product();
          $product->name = $request->name;
          $product->description = $request->description;
          $product->price = $request->price;

          if ($product->save()){
            return ['Result'=> 'Product Saved'];
          }else{
            return 'Product Not Saved';
          }

    }


      function updateProduct(Request $request){

          $product = Product::find($request->id);
          $product->name = $request->name;
          $product->description = $request->description;
          $product->price = $request->price;

          if ($product->save()){
            return ['Result'=> 'Product Updated'];
          }else{
            return 'Product Not Updated';
          }

    }
}
