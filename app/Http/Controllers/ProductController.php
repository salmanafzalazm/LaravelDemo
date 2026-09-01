<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    //

public function index(){
//dd('ProductController.index');


$products =  Product::all();
// dd($products->toArray());
// return view('products.index', compact('products'));
return view('products.index', ['products'=>$products]);


}


public function create(){

return view('products.create');

}


public function store(Request $request){

// dd($request->all());
// dd($request);

$request->validate([
'name'=> 'required|string|max:255',
'description'=> 'nullable|string',
'price'=> 'required|numeric|min:0',
'image'=> 'nullable|image|max:22048',
]);


//upload image if provided

$imagePath =null;
if($request->hasFile('image')){
// $imagePath = $request->file('image')->store('products', 'public');// add random string name if the uimage

$imageName = time() . '_'. $request->file('image')->getClientOriginalName();

$imagePath = $request->file('image')->storeAs('products', $imageName , 'public');
}

$product = new Product();
$product->name = $request->input('name');
$product->description = $request->input('description');
$product ->price = $request->input('price');
$product ->image = $imagePath;


$product->save();

return redirect()->route('product.index');


// return view('products.index');
}




public function edit(Product $product){

// dd($product);
// return view('products.edit', compact('product'));
//or
return view('products.edit', [
    'product' => $product
]);

}

public function update(Request $request, Product $product  ){

// dd($request->all());
$request->validate([
'name'=> 'required|string|max:255',
'description'=> 'nullable|string',
'price'=> 'required|numeric|min:0',
'image'=> 'nullable|image|max:22048',
]);



//upload image if provided

$imagePath =null;
if($request->hasFile('image')){
// $imagePath = $request->file('image')->store('products', 'public');// add random string name if the uimage

$imageName = time() . '_'. $request->file('image')->getClientOriginalName();

$imagePath = $request->file('image')->store('products', $imageName , 'public');

$product->image = $imagePath;
}

$product->name = $request->input('name');
$product->description = $request->input('description');
$product->price = $request->input('price');



$product->save();


return redirect()->route('product.index')->with('success', 'product updated successfully.');

}


public function destroy($id){

//  dd($id);
 $product = Product::find($id);

//  dd($product);
if ($product->image){
    \Storage::disk('public')->delete($product->image);
    // return redirect()->route('productssalman.index')->with('success', 'Product deleted succesasfully');
}

$product->delete();


return redirect()->route('product.index')->with('success', 'product Deleted successfully.');

}


}
