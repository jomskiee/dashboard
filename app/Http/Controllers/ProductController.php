<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function _construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('act1.productIndex')->with([
            'products'=> $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Products $product)
    {
        $product = Products::find($product);
        return view('act1.addproduct')->with([
            'product'=> $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required',
            'description'=> 'required',
            'price' => 'required|numeric',
        ]);
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if( $product->save()){
            return redirect()->route('product.index')->with('success', 'Product has been added successfully');
        }
        else{
            return redirect()->route('product.create')->with('error', 'Error in adding the product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('act1.show')->with([
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('act1.edit')->with([
            'product'=> $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required',
            'description'=> 'required',
            'price' => 'required|numeric',
        ]);
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if( $product->save()){
            return redirect()->route('product.index')->with('success', 'Product has been updated successfully');
        }
        else{
            return redirect()->route('product.edit')->with('error', 'Error updating the product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        if( $product->delete()){
            return redirect()->route('product.index')->with('success', 'Product has been deleted successfully');
        }
        else{
            return redirect()->route('product.index')->with('error', 'Error in deleting the product');
        }
    }
}
