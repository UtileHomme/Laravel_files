<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Exceptions\ProductNotBelongsToUser;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    
    public function _construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
    
    public function index()
    {
        return ProductCollection::collection(Product::paginate(20));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->save();
        
        
        return response(
            [
                'data' =>new ProductResource($product)
            ], Response::HTTP_CREATED
        );
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\Model\Product  $product
    * @return \Illuminate\Http\Response
    */
    public function show(Product $product)
    {
        //if we only return $product, we will have the exact database column names 
        //if we return a resource, we will get the names of "keys" as the ones we have defined in Product Resource
        return new ProductResource($product);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Model\Product  $product
    * @return \Illuminate\Http\Response
    */
    public function edit(Product $product)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Model\Product  $product
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Product $product)
    {
        $this->ProductUserCheck($product);
        
        $product->update($request->all());
        
        return response(
            [
                'data' =>new ProductResource($product)
            ], Response::HTTP_CREATED
        );
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Model\Product  $product
    * @return \Illuminate\Http\Response
    */
    public function destroy(Product $product)
    {
        $this->ProductUserCheck($product);
        
        $product->delete();
        
        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    public function ProductUserCheck($product)
    {
        if(Auth::id()!= $product->user_id)
        {
            throw new ProductNotBelongsToUser;
        }
    }
}