<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', ['items'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::all();
        $sub_cats = Sub_category::all();
        return view('backend.products.create', [
            'items'=>$cats,
            'sub_items'=>$sub_cats

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->	category_id = $request->category;
        $products->	sub_category_id = $request->sub_cat;
        $products->	price = $request->price;
        $products->	description = $request->description;
        $products->	status = $request->status;
   

        $rand_number = rand(1,20);
        $ext_lwer = strtolower($request->photo->extension());
        $file_name = $rand_number.time().".".$ext_lwer;

         $request->photo->move(public_path('images'), $file_name);
        $products->photo ='images/'.$file_name;
        $products->save();
        return redirect()->route('admin.product.index')->with('success', 'product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    
    {
        $categorys = Category::all();
        $sub_cats = Sub_category::all();
        return view('backend.products.edit', compact('product','categorys', 'sub_cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_cat;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status = $request->status;
   

        $rand_number = rand(1,20);
        $ext_lwer = strtolower($request->photo->extension());
        $file_name = $rand_number.time().".".$ext_lwer;

         $request->photo->move(public_path('images'), $file_name);
        $product->photo ='images/'.$file_name;

        $product->update();
        return redirect()->route('admin.product.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success','Deleted');
    }
}
